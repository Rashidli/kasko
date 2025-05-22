<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactItemController;
use App\Http\Controllers\Admin\ContactSocialController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\FormFieldController;
use App\Http\Controllers\Admin\FormSubmissionsController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MapController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OrderStatusController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PrefixController;
use App\Http\Controllers\Admin\PropertyInsuranceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ShareIconController;
use App\Http\Controllers\Admin\SingleController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WordController;
use App\Http\Controllers\Api\DaisController;
use App\Http\Controllers\Cabinet\AuthenticationController;
use App\Http\Controllers\Cabinet\ProductController;
use App\Http\Controllers\Front\DutyController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::get('storage_link', function (){
//    return \Illuminate\Support\Facades\Artisan::call('storage:link');
// });

// redirects
//  kasko sigorta
Route::redirect('/kasko-sigorta-kasko_avto.html', 'https://www.kasko.az/kasko-sigorta', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-kasko_avto-sl-az.html', 'https://www.kasko.az/kasko-sigorta', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-kasko_avto-sl-en.html', 'https://www.kasko.az/en/casco-insurance', 301);
Route::redirect('/kaskoaz-online-insurance-portal-kasko_avto-sl-ru.html', 'https://www.kasko.az/ru/straxovanie-kasko', 301);

// icbari avto sigorta
Route::redirect('/icbari-avto-sigorta-avto_i.html', 'https://www.kasko.az/icbari-avto-sigorta', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-avto_i-sl-az.html', 'https://www.kasko.az/icbari-avto-sigorta', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-avto_i-sl-ru.html', 'https://www.kasko.az/ru/obiazatelnoe-avtostraxovanie', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-avto_i-sl-en.html', 'https://www.kasko.az/en/compulsory-auto-insurance', 301);

// yasil kart
Route::redirect('/green-card-avto_yk.html', 'https://www.kasko.az/yasil-kart', 301);
Route::redirect('/kaskoaz-online-insurance-portal-avto_yk-sl-az.html', 'https://www.kasko.az/yasil-kart', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-avto_yk-sl-ru.html', 'https://www.kasko.az/ru/zelenaia-karta', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-avto_yk-sl-en.html', 'https://www.kasko.az/en/green-card', 301);

// icbari emlak sigortasi
Route::redirect('/icbari-emlak-sigortasi-property_i.html', 'https://www.kasko.az/icbari-emlak-sigortasi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-property_i-sl-az.html', 'https://www.kasko.az/icbari-emlak-sigortasi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-property_i-sl-ru.html', 'https://www.kasko.az/ru/obiazatelnoe-straxovanie-imushhestva', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-property_i-sl-en.html', 'https://www.kasko.az/en/compulsory-property-insurance', 301);

// konullu emlak sigortasi
Route::redirect('/konullu-emlak-sigortasi-property_k.html', 'https://www.kasko.az/konullu-emlak-sigortasi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-property_k-sl-az.html', 'https://www.kasko.az/konullu-emlak-sigortasi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-property_k-sl-ru.html', 'https://www.kasko.az/ru/dobrovolnoe-straxovanie-imushhestva', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-property_k-sl-en.html', 'https://www.kasko.az/en/voluntary-property-insurance', 301);

// seyahet sigortasi
Route::redirect('/seyahet-sigortasi-travel.html', 'https://www.kasko.az/seyahet-sigortasi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-travel-sl-az.html', 'https://www.kasko.az/seyahet-sigortasi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-travel-sl-ru.html', 'https://www.kasko.az/ru/straxovanie-putesestvii', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-travel-sl-en.html', 'https://www.kasko.az/en/travel-insurance', 301);

// online cerime odenisleri
Route::redirect('/onlayn-cerime-odenisi-cerime.html', 'https://www.kasko.az/onlayn-cerime-odenisleri', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-cerime-sl-az.html', 'https://www.kasko.az/onlayn-cerime-odenisleri', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-cerime-sl-en.html', 'https://www.kasko.az/en/online-fine-payments', 301);
Route::redirect('/kaskoaz-online-insurance-portal-cerime-sl-ru.html', 'https://www.kasko.az/ru/oplata-strafov-onlain', 301);

// online sigorta odenisi
Route::redirect('/onlayn-sigorta-odenisi-polisi_o.html', 'https://www.kasko.az/onlayn-sigorta-odenisi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-polisi_o-sl-az.html', 'https://www.kasko.az/onlayn-sigorta-odenisi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-polisi_o-sl-ru.html', 'https://www.kasko.az/ru/oplata-straxovki-onlain', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-polisi_o-sl-en.html', 'https://www.kasko.az/en/online-insurance-payment', 301);

// cerime ve ballarin yoxlanilmasi
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-polisi_o-sl-en.html', 'https://www.kasko.az/cerime-ve-ballarin-yoxlanmasi', 301);
Route::redirect('/cerime-ve-ballarin-yoxlanmasi-cerime_y.html', 'https://www.kasko.az/cerime-ve-ballarin-yoxlanmasi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-cerime_y-sl-az.html', 'https://www.kasko.az/cerime-ve-ballarin-yoxlanmasi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-cerime_y-sl-ru.html', 'https://www.kasko.az/ru/proverka-strafa-i-ockov', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-cerime_y-sl-en.html', 'https://www.kasko.az/en/checking-penalty-and-points', 301);

// gomruk kalkulyatoru
Route::redirect('/gomruk-kalkulyatoru-gomruk.html', 'https://www.kasko.az/gomruk-kalkulyatoru', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-gomruk-sl-az.html', 'https://www.kasko.az/gomruk-kalkulyatoru', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-gomruk-sl-ru.html', 'https://www.kasko.az/ru/tamozennyi-kalkuliator', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-gomruk-sl-en.html', 'https://www.kasko.az/en/customs-calculator', 301);

// yasil kart kalkulyatoru
Route::redirect('/yasil-kart-kalkulyatoru-green_k.html', 'https://www.kasko.az/yasil-kart-sigorta-kalkulyatoru', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-green_k-sl-az.html', 'https://www.kasko.az/yasil-kart-sigorta-kalkulyatoru', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-green_k-sl-ru.html', 'https://www.kasko.az/ru/kalkuliator-straxovki-grin-karty', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-green_k-sl-en.html', 'https://www.kasko.az/en/green-card-insurance-calculator', 301);

// icbari sigorta kalkulyatoru
Route::redirect('/icbari-sigorta-kalkulyatoru-police_price.html', 'https://www.kasko.az/icbari-sigorta-kalkulyatoru', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-police_price-sl-az.html', 'https://www.kasko.az/icbari-sigorta-kalkulyatoru', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-police_price-sl-ru.html', 'https://www.kasko.az/ru/kalkuliator-obiazatelnogo-straxovaniia', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-police_price-sl-en.html', 'https://www.kasko.az/en/compulsory-insurance-calculator', 301);

// sigorta muqavilesini yoxla
Route::redirect('/sigorta-muqavilesini-yoxla-polisi_y.html', 'https://www.kasko.az/sigorta-muqavilesini-yoxla', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-polisi_y-sl-az.html', 'https://www.kasko.az/sigorta-muqavilesini-yoxla', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-polisi_y-sl-ru.html', 'https://www.kasko.az/ru/proverte-dogovor-straxovaniia', 301);
Route::redirect('//kaskoaz-onlayn-strahovoy-portal-polisi_y-sl-en.html', 'https://www.kasko.az/en/check-the-insurance-contract', 301);

// sigorta hadisesi bas vererse
Route::redirect('/sigorta-hadisesi-bas-vererse-insurance.html', 'https://www.kasko.az/sigorta-muqavilesini-yoxla', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance-sl-az.html', 'https://www.kasko.az/sigorta-muqavilesini-yoxla', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance-sl-ru.html', 'https://www.kasko.az/ru/proverte-dogovor-straxovaniia', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-insurance-sl-en.html', 'https://www.kasko.az/en/check-the-insurance-contract', 301);

// 9707
Route::redirect('/9707-sms-xidmeti-insurance1.html', 'https://www.kasko.az/sigorta-muqavilesini-yoxla', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance1-sl-az.html', 'https://www.kasko.az/sigorta-muqavilesini-yoxla', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance1-sl-ru.html', 'https://www.kasko.az/sigorta-muqavilesini-yoxla', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-insurance1-sl-en.html', 'https://www.kasko.az/sigorta-muqavilesini-yoxla', 301);

// kompensasiya odenisi
Route::redirect('/kompensasiya-odenisi-insurance2.html', 'https://www.kasko.az/kompensasiya-odenisi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance2-sl-az.html', 'https://www.kasko.az/kompensasiya-odenisi', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance2-sl-ru.html', 'https://www.kasko.az/ru/kompensacii', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-insurance2-sl-en.html', 'https://www.kasko.az/en/compensation-payment', 301);

// tez tez verilern suallar
Route::redirect('/tez-tez-verilen%20suallar-insurance3.html', 'https://www.kasko.az/tez-tez-verilen-suallar', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance3-sl-az.html', 'https://www.kasko.az/tez-tez-verilen-suallar', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance3-sl-ru.html', 'https://www.kasko.az/ru/casto-zadavaemye-voprosy', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-insurance3-sl-en.html', 'https://www.kasko.az/en/frequently-asked-questions', 301);

// kasko sigorta haqqinda qanun
Route::redirect('/kasko-sigorta-haqqinda-insurance4.html', 'https://www.kasko.az/kasko-sigorta-qaydalar', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance4-sl-az.html', 'https://www.kasko.az/kasko-sigorta-qaydalar', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance4-sl-en.html', 'https://www.kasko.az/en/casco-insurance-rules', 301);
Route::redirect('/kaskoaz-online-insurance-portal-insurance4-sl-ru.html', 'https://www.kasko.az/ru/pravila-straxovaniia-kasko', 301);

// icbari sigorta haqqinda qanun
Route::redirect('/icbari-sigorta-haqqinda-insurance5.html', 'https://www.kasko.az/icbari-sigortalar-haqqinda-qanun', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance5-sl-az.html', 'https://www.kasko.az/icbari-sigortalar-haqqinda-qanun', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-insurance5-sl-ru.html', 'https://www.kasko.az/ru/zakon-ob-obiazatelnom-straxovanii', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-insurance5-sl-en.html', 'https://www.kasko.az/en/law-on-compulsory-insurances', 301);

// home page
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-HomePage.html', 'https://www.kasko.az', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-HomePage-sl-az.html', 'https://www.kasko.az', 301);
Route::redirect('/kaskoaz-onlayn-strahovoy-portal-HomePage-sl-en.html', 'https://www.kasko.az/en', 301);
Route::redirect('/kaskoaz-onlayn-sigorta-portali-HomePage-sl-ru.html', 'https://www.kasko.az/ru', 301);

Route::get('migrate', fn () => Illuminate\Support\Facades\Artisan::call('migrate'));

//
// Route::get('cache_reset', function (){
//    return \Illuminate\Support\Facades\Artisan::call('permission:cache-reset');
// });
//
//
// Route::get('optimize', function (){
//    return \Illuminate\Support\Facades\Artisan::call('optimize:clear');
// });

Route::group(['prefix' => 'admin'], function (): void {
    Route::get('/', [PageController::class, 'login'])->name('login');
    // Route::get('/register', [PageController::class,'register'])->name('register');
    Route::post('/login_submit', [AuthController::class, 'login_submit'])->name('login_submit');
    // Route::post('/register_submit',[AuthController::class,'register_submit'])->name('register_submit');

    Route::group(['middleware' => 'auth'], function (): void {
        Route::get('/home', [PageController::class, 'home'])->name('home');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::resource('users', UserController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('order_statuses', OrderStatusController::class);

        Route::get('/property-insurances', [PropertyInsuranceController::class, 'index'])->name('property.insurances');
        Route::get('/property-insurances/{id}', [PropertyInsuranceController::class, 'show'])->name('property.insurances.show');

        Route::resource('mains', MainController::class);
        Route::resource('messages', MessageController::class);
        Route::resource('partners', PartnerController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('faqs', FaqController::class);
        Route::resource('socials', SocialController::class);
        Route::resource('contact_items', ContactItemController::class);
        Route::resource('singles', SingleController::class);
        Route::resource('words', WordController::class);
        Route::resource('images', ImageController::class);
        Route::resource('statistics', StatisticController::class);
        Route::resource('links', LinkController::class);
        Route::resource('advantages', AdvantageController::class);
        Route::resource('tags', TagController::class);
        Route::resource('abouts', AboutController::class);
        Route::resource('forms', FormController::class);
        Route::resource('forms.form_fields', FormFieldController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('maps', MapController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('form_fields', FormFieldController::class);
        Route::resource('contact_socials', ContactSocialController::class);
        Route::resource('form_submissions', FormSubmissionsController::class);
        Route::resource('share_icons', ShareIconController::class);
        Route::resource('prefixes', PrefixController::class);
        Route::post('exportSubmissionsToExcel', [FormSubmissionsController::class, 'exportSubmissionsToExcel'])->name('exportSubmissionsToExcel');
        Route::resource('contents', ContentController::class);
        Route::resource('contacts', ContactController::class);
        Route::get('/delete-slider-image/{id}', [BlogController::class, 'deleteImage'])
            ->name('delete-slider-image');
        Route::get('/services/{id}/delete-image', [ServiceController::class, 'deleteImage'])->name('services.delete-image');
    });
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function (): void {
    Route::any('/successcallback-property', [HomeController::class, 'successDeis'])->name('test-success');

    //    Route::get('success-property-deis', [HomeController::class, 'successDeis'])->name('success.property.deis');
        Route::get('fail-property-deis', [HomeController::class, 'failDeis'])->name('fail.property.deis');

    Route::any('/failurecallback-property', [DaisController::class, 'testFail'])->name('test-fail');

    Route::get('/success-property', [DaisController::class, 'successPage'])->name('test-success-page');
    Route::get('/fail-property', [DaisController::class, 'failPage'])->name('test-fail-page');

    // Authentication Routes
    Route::middleware('auth.customer')->group(function (): void {
        Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('dashboard.login');
        Route::post('/login', [AuthenticationController::class, 'login'])->name('dashboard.login.submit');
        Route::get('/dashboard', [AuthenticationController::class, 'cabinetDashboard'])->name('cabinet.welcome');

        Route::get('property-insurance', [ProductController::class, 'propertyInsurance'])->name('property.insurance');
        Route::post('get-iframe-url', [ProductController::class, 'getIframeUrl'])->name('get_iframe_url');
    });

    Route::get('/dashboard-logout', [AuthenticationController::class, 'logout'])->name('dashboard.logout');

    Route::get('/register', [AuthenticationController::class, 'showRegisterForm'])->name('dashboard.register');
    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::get('/email', [HomeController::class, 'email'])->name('email');
    Route::get('/calculate_icbari', [DutyController::class, 'calculate_icbari'])->name('calculate_icbari');
    Route::post('get_data', [DutyController::class, 'getData'])->name('get_data');

    Route::post('calculate_kasko', [HomeController::class, 'calculate_kasko'])->name('calculate_kasko');

    Route::get('/sitemap.xml', [SitemapController::class, 'sitemap']);
    Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
    Route::get('success/{service_id?}', [HomeController::class, 'success'])->name('success');

    Route::get('{slug}', [HomeController::class, 'dynamicPage'])->name('dynamic.page');
    Route::post('submit', [HomeController::class, 'submit'])->name('forms.submit');
    Route::post('calc_form_submit', [HomeController::class, 'calc_form_submit'])->name('calc_form_submit');
    Route::post('/contact_post', [HomeController::class, 'contact_post'])->name('contact_post');
});
