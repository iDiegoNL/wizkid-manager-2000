<?php

namespace App\Http\Livewire\Wizkids;

use App\Enums\WizkidRole;
use App\Models\Wizkid;
use Filament\Notifications\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditWizkid extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public Wizkid $wizkid;

    public string $name = '';
    public string $email = '';
    public string $phone_number = '';
    public WizkidRole|string $role = 'Please select a role';
    public $profile_photo = '';

    public function mount(int $wizkidId): void
    {
        $this->wizkid = Wizkid::withTrashed()->findOrFail($wizkidId);

        $this->authorize('update', $this->wizkid);

        $this->fill([
            'name' => $this->wizkid->name,
            'email' => $this->wizkid->email,
            'phone_number' => $this->wizkid->phone_number,
        ]);
    }

    public function render()
    {
        return view('livewire.wizkids.edit-wizkid');
    }

    public function update()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('wizkids')->ignore($this->wizkid->id)],
            'phone_number' => ['nullable', 'phone:AUTO', 'max:255', Rule::unique('wizkids')->ignore($this->wizkid->id)],
        ]);

        $this->wizkid->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
        ]);

        Notification::make()
            ->title('Wizkid edited!')
            ->success()
            ->send();

        return redirect()->route('home');
    }
}
