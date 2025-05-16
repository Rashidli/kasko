<?php

namespace App\Livewire;

use App\Models\Blog;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class BlogSortTable extends Component
{
    public function updateBlogOrder($categories)
    {
        foreach ($categories as $category) {
            Blog::whereId($category['value'])->update(['row' => $category['order']]);
        }
    }

    public function render()
    {
        $blogs = Blog::query()->orderBy('row')->get();
        return view('admin.livewire.blog-sort-table', compact('blogs'));
    }

}
