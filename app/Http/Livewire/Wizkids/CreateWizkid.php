<?php

namespace App\Http\Livewire\Wizkids;

use App\Enums\WizkidRole;
use App\Models\Wizkid;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateWizkid extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $email = '';
    public string $phone_number = '';
    public string $role = 'Please select a role';
    public $profile_photo = '';

    public function render()
    {
        return view('livewire.wizkids.create-wizkid');
    }

    public function create()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:wizkids'],
            'phone_number' => ['nullable', 'phone:AUTO', 'max:255', 'unique:wizkids'],
            'role' => ['required', new Enum(WizkidRole::class)],
            'profile_photo' => ['required', 'image', 'max:1024'],
        ]);

        Wizkid::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'role' => $this->role,
            'profile_photo_path' => $this->profile_photo->store('wizkids', 'public'),
        ]);

        return redirect()->route('home');
    }
}
