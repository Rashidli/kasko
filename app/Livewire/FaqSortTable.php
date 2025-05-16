<?php

namespace App\Livewire;

use App\Models\Faq;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class FaqSortTable extends Component
{
    public function updateFaqOrder($categories)
    {
        foreach ($categories as $category) {
            Faq::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $faqs = Faq::query()->orderBy('row')->get();
        return view('admin.livewire.faq-sort-table', compact('faqs'));
    }

}
