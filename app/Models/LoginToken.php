<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginToken extends Model
{
    use Prunable;

    protected $fillable = [
        'user_id',
        'token',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function wizkid(): BelongsTo
    {
        return $this->belongsTo(Wizkid::class);
    }

    public function isValid(): bool
    {
        return !$this->isExpired();
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isBefore(now());
    }

    /**
     * Get the prunable model query.
     *
     * @return Builder
     */
    public function prunable(): Builder
    {
        return static::where('expires_at', '<', now());
    }
}
