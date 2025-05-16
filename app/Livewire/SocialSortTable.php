<?php

namespace App\Livewire;

use App\Models\Social;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SocialSortTable extends Component
{
    public function updateSocialOrder($categories)
    {
        foreach ($categories as $category) {
            Social::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $socials = Social::query()->orderBy('row')->get();
        return view('admin.livewire.social-sort-table', compact('socials'));
    }

}
