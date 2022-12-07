<?php

namespace App\Http\Livewire\Wizkids;

use App\Models\Wizkid;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class IndexWizkids extends Component
{
    use AuthorizesRequests;

    public Collection $wizkids;

    public function mount()
    {
        $this->authorize('viewAny', Wizkid::class);

        $this->wizkids = Wizkid::all();
    }

    public function render()
    {
        return view('livewire.wizkids.index-wizkids');
    }

    public function something()
    {
        dd('something');
    }
}
