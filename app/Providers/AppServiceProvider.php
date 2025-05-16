<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\ContactItem;
use App\Models\ContactSocial;
use App\Models\Content;
use App\Models\Image;
use App\Models\Link;
use App\Models\Single;
use App\Models\Social;
use App\Models\Tag;
use App\Models\Word;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $home_page                   = Single::query()->where('type', 'home')->first();
        $news_page                   = Single::query()->where('type', 'news')->first();
        $contact_page                = Single::query()->where('type', 'contact')->first();
        $about_page                  = Single::query()->where('type', 'about')->first();
        $faq_page                    = Single::query()->where('type', 'faq')->first();
        $customs_caclulator          = Single::query()->where('type', 'customs_caclulator')->first();
        $casco_calculator            = Single::query()->where('type', 'casco_calculator')->first();
        $green_card_calculator       = Single::query()->where('type', 'green_card_calculator')->first();
        $icbari_sigorta_kalkulyatoru = Single::query()->where('type', 'icbari_sigorta_kalkulyatoru')->first();

        $tags            = Tag::active()->get();
        $contact_items   = ContactItem::active()->orderBy('row')->get();
        $socials         = Social::active()->orderBy('row')->get();
        $links           = Link::active()->orderBy('row')->get();
        $contents        = Content::active()->orderBy('row')->get();
        $logo            = Image::query()->first();
        $words           = Word::all()->keyBy('key');
        $favicon         = Image::orderBy('id', 'desc')->first();
        $categories      = Category::with('services.form.form_submissions')->get();
        $main_categories = Category::query()->with('services.form.form_submissions')->get();
        $main_menus      = Single::query()->where('is_active', true)->orderBy('row')->get();

        $sigorta_fealiyeti_haqqinda_qanun = Single::query()->where('type', 'sigorta_fealiyeti_haqqinda_qanun')->first();
        $inzibati_xetalar_mecellesi       = Single::query()->where('type', 'inzibati_xetalar_mecellesi')->first();
        $sigorta_beledcisi                = Single::query()->where('type', 'sigorta_beledcisi')->first();
        $icbari_sigortalar_haqqinda_qanun = Single::query()->where('type', 'icbari_sigortalar_haqqinda_qanun')->first();
        $tibbi_sigorta_haqqinda_qanun     = Single::query()->where('type', 'tibbi_sigorta_haqqinda_qanun')->first();
        $dq_nin_is_haqqinda_qanun         = Single::query()->where('type', 'dq_nin_is_haqqinda_qanun')->first();
        $kasko_sigorta_qaydalar           = Single::query()->where('type', 'kasko_sigorta_qaydalar')->first();
        $singles                          = Single::query()->where('is_hide', true)->get();
        $contact_socials                  = ContactSocial::active()->orderBy('row')->get();
        $blogs                            = Blog::query()->active()->get();

        //        dd($contact_socials);

        View::share([
            'home_page'                   => $home_page,
            'customs_caclulator'          => $customs_caclulator,
            'casco_calculator'            => $casco_calculator,
            'green_card_calculator'       => $green_card_calculator,
            'news_page'                   => $news_page,
            'contact_page'                => $contact_page,
            'about_page'                  => $about_page,
            'faq_page'                    => $faq_page,
            'tags'                        => $tags,
            'socials'                     => $socials,
            'contact_items'               => $contact_items,
            'links'                       => $links,
            'contents'                    => $contents,
            'logo'                        => $logo,
            'favicon'                     => $favicon,
            'words'                       => $words,
            'categories'                  => $categories,
            'main_categories'             => $main_categories,
            'main_menus'                  => $main_menus,
            'contact_socials'             => $contact_socials,
            'icbari_sigorta_kalkulyatoru' => $icbari_sigorta_kalkulyatoru,

            'sigorta_beledcisi'                => $sigorta_beledcisi,
            'sigorta_fealiyeti_haqqinda_qanun' => $sigorta_fealiyeti_haqqinda_qanun,
            'inzibati_xetalar_mecellesi'       => $inzibati_xetalar_mecellesi,
            'icbari_sigortalar_haqqinda_qanun' => $icbari_sigortalar_haqqinda_qanun,
            'tibbi_sigorta_haqqinda_qanun'     => $tibbi_sigorta_haqqinda_qanun,
            'dq_nin_is_haqqinda_qanun'         => $dq_nin_is_haqqinda_qanun,
            'kasko_sigorta_qaydalar'           => $kasko_sigorta_qaydalar,

            'singles'      => $singles,
            'footer_blogs' => $blogs,
        ]);
    }
}
