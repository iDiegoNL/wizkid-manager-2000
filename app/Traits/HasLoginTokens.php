<?php

namespace App\Traits;

use App\Mail\MagicLoginLink;
use App\Models\LoginToken;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

trait HasLoginTokens
{
    public function loginTokens(): HasMany
    {
        return $this->hasMany(LoginToken::class);
    }

    public function sendLoginLink(): void
    {
        $token = Str::random(32);

        $loginToken = $this->loginTokens()->create([
            'token' => hash('sha256', $token),
            'expires_at' => now()->addMinutes(15),
        ]);

        Mail::to($this->email)->queue(new MagicLoginLink($token, $loginToken->expires_at, $this));
    }
}
