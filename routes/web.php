<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactItemController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\FormFieldController;
use App\Http\Controllers\Admin\FormSubmissionsController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SingleController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WordController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('storage_link', function (){
    return \Illuminate\Support\Facades\Artisan::call('storage:link');
});

Route::get('migrate', function (){
    return \Illuminate\Support\Facades\Artisan::call('migrate');
});

Route::get('cache_reset', function (){
    return \Illuminate\Support\Facades\Artisan::call('permission:cache-reset');
});


Route::get('optimize', function (){
    return \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

Route::group(['prefix' => 'admin'], function (){

    Route::get('/', [PageController::class,'login'])->name('login');
    Route::get('/register', [PageController::class,'register'])->name('register');
    Route::post('/login_submit',[AuthController::class,'login_submit'])->name('login_submit');
    Route::post('/register_submit',[AuthController::class,'register_submit'])->name('register_submit');

    Route::group(['middleware' =>'auth'], function (){

        Route::get('/home', [PageController::class,'home'])->name('home');
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');

        Route::resource('users',UserController::class);
        Route::resource('roles',RoleController::class);
        Route::resource('permissions',PermissionController::class);

        Route::resource('mains',MainController::class);
        Route::resource('partners',PartnerController::class);
        Route::resource('blogs',BlogController::class);
        Route::resource('faqs',FaqController::class);
        Route::resource('socials',SocialController::class);
        Route::resource('contact_items',ContactItemController::class);
        Route::resource('singles',SingleController::class);
        Route::resource('words',WordController::class);
        Route::resource('images',ImageController::class);
        Route::resource('statistics',StatisticController::class);
        Route::resource('links',LinkController::class);
        Route::resource('advantages',AdvantageController::class);
        Route::resource('tags',TagController::class);
        Route::resource('abouts',AboutController::class);
        Route::resource('forms',FormController::class);
        Route::resource('forms.form_fields',FormFieldController::class);
        Route::resource('categories',CategoryController::class);
        Route::resource('services',ServiceController::class);
        Route::resource('form_fields',FormFieldController::class);
        Route::resource('form_submissions',FormSubmissionsController::class);
        Route::resource('contents',ContentController::class);
        Route::resource('contacts',ContactController::class);
        Route::get('/delete-slider-image/{id}', [BlogController::class, 'deleteImage'])
            ->name('delete-slider-image');

    });
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function (){
    Route::get('sigorta_qanunu', [HomeController::class,'sigorta_qanunu'])->name('sigorta_qanunu');
    Route::get('dovlet_qulluqculari', [HomeController::class,'dovlet_qulluqculari'])->name('dovlet_qulluqculari');
    Route::get('icbari_sigorta_qanun', [HomeController::class,'icbari_sigorta_qanun'])->name('icbari_sigorta_qanun');
    Route::get('inzibati_xetalar_mecellesi', [HomeController::class,'inzibati_xetalar_mecellesi'])->name('inzibati_xetalar_mecellesi');
    Route::get('tibbi_sigorta_qanun', [HomeController::class,'tibbi_sigorta_qanun'])->name('tibbi_sigorta_qanun');
    Route::get('kasko_qanun', [HomeController::class,'kasko_qanun'])->name('kasko_qanun');
    Route::get('sigorta_beledcisi', [HomeController::class,'sigorta_beledcisi'])->name('sigorta_beledcisi');

    Route::get('/sitemap.xml', [SitemapController::class, 'sitemap']);
    Route::get('/', [HomeController::class,'welcome'])->name('welcome');
    Route::get('success',[HomeController::class,'success'])->name('success');
    Route::get('{slug}', [HomeController::class,'dynamicPage'])->name('dynamic.page');
    Route::post('submit', [HomeController::class,'submit'])->name('forms.submit');
    Route::post('/contact_post',[HomeController::class,'contact_post'])->name('contact_post');
});
