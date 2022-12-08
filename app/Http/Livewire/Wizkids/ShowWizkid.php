<?php

namespace App\Http\Livewire\Wizkids;

use App\Models\Wizkid;
use Filament\Notifications\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\Redirector;

class ShowWizkid extends Component
{
    use AuthorizesRequests;

    public Wizkid $wizkid;

    public function mount(int $wizkidId): void
    {
        $this->wizkid = Wizkid::withTrashed()->findOrFail($wizkidId);

        $this->authorize('view', $this->wizkid);
    }

    public function render()
    {
        return view('livewire.wizkids.show-wizkid');
    }

    public function forceDeleteWizkid(): RedirectResponse|Redirector
    {
        $this->authorize('forceDelete', $this->wizkid);

        $this->wizkid->forceDelete();

        Notification::make()
            ->title('Wizkid deleted!')
            ->success()
            ->send();

        return redirect()->route('home');
    }

    public function fireWizkid(): void
    {
        $this->authorize('delete', $this->wizkid);

        $this->wizkid->delete();

        Notification::make()
            ->title('Wizkid fired!')
            ->icon('heroicon-o-fire')
            ->iconColor('danger')
            ->send();
    }

    public function unfireWizkid(): void
    {
        $this->authorize('restore', $this->wizkid);

        $this->wizkid->restore();

        Notification::make()
            ->title('Wizkid unfired!')
            ->icon('heroicon-o-rewind')
            ->iconColor('primary')
            ->send();
    }
}
