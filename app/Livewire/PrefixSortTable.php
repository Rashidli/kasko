<?php

namespace App\Livewire;

use App\Models\Prefix;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PrefixSortTable extends Component
{
    public function updatePrefixOrder($categories)
    {
        foreach ($categories as $category) {
            Prefix::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $prefixes = Prefix::query()->orderBy('row')->get();
        return view('admin.livewire.prefix-sort-table', compact('prefixes'));
    }

}
