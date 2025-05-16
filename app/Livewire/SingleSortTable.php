<?php

namespace App\Livewire;

use App\Models\Single;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SingleSortTable extends Component
{
    public function updateSingleOrder($categories)
    {
        foreach ($categories as $category) {
            Single::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $singles = Single::query()->orderBy('row')->get();
        return view('admin.livewire.single-sort-table', compact('singles'));
    }

}
