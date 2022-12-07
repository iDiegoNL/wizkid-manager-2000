<?php

namespace App\Http\Livewire\Wizkids;

use App\Models\Wizkid;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

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

    public function forceDeleteWizkid(): RedirectResponse
    {
        $this->authorize('forceDelete', $this->wizkid);

        $this->wizkid->forceDelete();

        return redirect()->route('home');
    }

    public function fireWizkid(): void
    {
        $this->authorize('delete', $this->wizkid);

        $this->wizkid->delete();
    }

    public function unfireWizkid(): void
    {
        $this->authorize('restore', $this->wizkid);

        $this->wizkid->restore();
    }
}
