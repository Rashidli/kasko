<?php

namespace App\Livewire;

use App\Models\Content;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ContentSortTable extends Component
{
    public function updateContentOrder($categories)
    {
        foreach ($categories as $category) {
            Content::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $contents = Content::query()->orderBy('row')->get();
        return view('admin.livewire.content-sort-table', compact('contents'));
    }

}
