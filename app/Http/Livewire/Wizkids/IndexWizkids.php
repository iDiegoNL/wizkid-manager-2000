<?php

namespace App\Http\Livewire\Wizkids;

use App\Models\Wizkid;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class IndexWizkids extends Component
{
    use AuthorizesRequests;

    protected $queryString = [
        'roleFilter' => ['except' => '', 'as' => 'role'],
        'nameFilter' => ['except' => '', 'as' => 'name'],
    ];
    public string $roleFilter = '';
    public string $nameFilter = '';

    public function mount()
    {
        $this->authorize('viewAny', Wizkid::class);
    }

    public function render()
    {
        return view('livewire.wizkids.index-wizkids', [
            'wizkids' => Wizkid::query()
                ->where(fn($query) => $this->roleFilter ? $query->where('role', $this->roleFilter) : $query)
                ->where(fn($query) => $this->nameFilter ? $query->where('name', 'like', "%{$this->nameFilter}%") : $query)
                ->get(),
        ]);
    }
}
