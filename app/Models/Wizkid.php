<?php

namespace App\Models;

use App\Enums\WizkidRole;
use App\Traits\HasLoginTokens;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class Wizkid extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasLoginTokens;
    use Notifiable;
    use SoftDeletes;
    use Prunable;

    public const DELETED_AT = 'fired_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'profile_photo_path',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'role' => WizkidRole::class,
    ];

    public function profilePhotoUrl(): string
    {
        $disk = Storage::disk(config('app.profile_photos_driver'));
        $defaultProfilePhoto = asset('images/owow-logo.png');

        if (!$this->profile_photo_path) {
            return $defaultProfilePhoto;
        }


        return $disk->fileExists($this->profile_photo_path)
            ? $disk->url($this->profile_photo_path)
            : $defaultProfilePhoto;
    }

    /**
     * Get the prunable model query.
     *
     * @return Builder
     */
    public function prunable(): Builder
    {
        return static::where('fired_at', '<', now()->addWeek());
    }
}
