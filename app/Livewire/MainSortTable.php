<?php

namespace App\Livewire;

use App\Models\Main;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MainSortTable extends Component
{
    public function updateMainOrder($categories)
    {
        foreach ($categories as $category) {
            Main::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $mains = Main::query()->orderBy('row')->get();
        return view('admin.livewire.main-sort-table', compact('mains'));
    }

}
