<?php

namespace App\Livewire;

use App\Models\Link;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class LinkSortTable extends Component
{
    public function updateLinkOrder($categories)
    {
        foreach ($categories as $category) {
            Link::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $links = Link::query()->orderBy('row')->get();
        return view('admin.livewire.link-sort-table', compact('links'));
    }

}
