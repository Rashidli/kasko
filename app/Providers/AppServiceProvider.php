<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\ContactItem;
use App\Models\Content;
use App\Models\Image;
use App\Models\Link;
use App\Models\Single;
use App\Models\Social;
use App\Models\Tag;
use App\Models\Word;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $home_page = Single::where('type','home')->first();
        $news_page = Single::where('type','news')->first();
        $contact_page = Single::where('type','contact')->first();
        $about_page = Single::where('type','about')->first();
        $faq_page = Single::where('type','faq')->first();
        $tags = Tag::active()->get();
        $contact_items = ContactItem::active()->get();
        $socials = Social::active()->get();
        $links = Link::active()->get();
        $contents = Content::active()->get();
        $logo = Image::first();
        $words = Word::all()->keyBy('key');
        $favicon = Image::orderBy('id', 'desc')->first();
        $categories = Category::with('services.form.form_submissions')->get();
        $main_categories = Category::query()->with('services.form.form_submissions')->get();
        
        View::share([
            'home_page' => $home_page,
            'news_page' => $news_page,
            'contact_page' => $contact_page,
            'about_page' => $about_page,
            'faq_page' => $faq_page,
            'tags' => $tags,
            'socials' => $socials,
            'contact_items' => $contact_items,
            'links' => $links,
            'contents' => $contents,
            'logo' => $logo,
            'favicon' => $favicon,
            'words' => $words,
            'categories' => $categories,
            'main_categories' => $main_categories,
        ]);
    }
}
