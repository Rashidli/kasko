<?php

namespace App\Livewire;

use App\Models\ContactSocial;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ContactSocialSortTable extends Component
{
    public function updateContactSocialOrder($categories)
    {
        foreach ($categories as $category) {
            ContactSocial::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $contact_socials = ContactSocial::query()->orderBy('row')->get();
        return view('admin.livewire.contact_social-sort-table', compact('contact_socials'));
    }

}
