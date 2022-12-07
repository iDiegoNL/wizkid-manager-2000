<?php

namespace App\Http\Livewire\Auth;

use App\Models\Wizkid;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $email = '';


    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
    ];

    public function authenticate()
    {
        $this->validate();

        $wizkid = Wizkid::query()
            ->where('email', $this->email)
            ->first();

        if ($wizkid) {
            $wizkid->sendLoginLink();
        }

        session()->flash('magic-link-sent', true);
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
