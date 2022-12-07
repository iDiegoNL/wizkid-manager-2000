<?php

namespace App\Http\Livewire\Wizkids;

use App\Models\Wizkid;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class IndexWizkids extends Component
{
    public Collection $wizkids;

    public function mount()
    {
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
