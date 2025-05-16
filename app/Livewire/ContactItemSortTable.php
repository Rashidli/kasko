<?php

namespace App\Livewire;

use App\Models\ContactItem;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ContactItemSortTable extends Component
{
    public function updateContactItemOrder($categories)
    {
        foreach ($categories as $category) {
            ContactItem::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $contact_items = ContactItem::query()->orderBy('row')->get();
        return view('admin.livewire.contact_item-sort-table', compact('contact_items'));
    }

}
