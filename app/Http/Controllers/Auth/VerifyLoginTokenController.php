<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginToken;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyLoginTokenController extends Controller
{
    /**
     * Verify the login token
     *
     * @param Request $request
     * @param string $token
     *
     * @return RedirectResponse
     */
    public function __invoke(Request $request, string $token)
    {
        $loginToken = LoginToken::query()
            ->where('token', hash('sha256', $token))
            ->firstOrFail();

        abort_unless($request->hasValidSignature() && $loginToken->isValid(), 401);

        $loginToken->delete();

        Auth::login($loginToken->wizkid);

        return redirect()->route('home');
    }
}
