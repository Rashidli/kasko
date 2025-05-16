<?php

namespace App\Livewire;

use App\Models\Partner;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PartnerSortTable extends Component
{
    public function updatePartnerOrder($categories)
    {
        foreach ($categories as $category) {
            Partner::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $partners = Partner::query()->orderBy('row')->get();
        return view('admin.livewire.partner-sort-table', compact('partners'));
    }
}
