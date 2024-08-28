<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServiceSortTable extends Component
{
    public function updateServiceOrder($categories)
    {
        foreach ($categories as $category) {
            Service::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $services = Service::with('category')->orderBy('row')->get();
        return view('admin.livewire.service-sort-table', compact('services'));
    }
}
