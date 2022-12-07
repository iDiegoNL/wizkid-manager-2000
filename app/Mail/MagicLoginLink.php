<?php

namespace App\Mail;

use App\Models\Wizkid;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class MagicLoginLink extends Mailable
{
    use Queueable, SerializesModels;

    public string $token;
    public Carbon $expiresAt;
    public Wizkid $wizkid;

    public function __construct(string $token, Carbon $expiresAt, Wizkid $wizkid)
    {
        $this->token = $token;
        $this->expiresAt = $expiresAt;
        $this->wizkid = $wizkid;
    }

    public function build()
    {
        return $this->subject(
            config('app.name') . ' Login Verification'
        )->markdown('emails.magic-login-link', [
            'url' => URL::temporarySignedRoute('verify-login', $this->expiresAt, [
                'token' => $this->token,
            ]),
        ]);
    }
}
