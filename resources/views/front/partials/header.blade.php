<nav>
    <div class="navbar-container p-lr">
        <div class="navbar-inner">
            <a href="{{route('welcome')}}" class="nav-logo">
                <img src="{{asset('storage/' . $logo->image)}}" alt="logo" title="logo">
            </a>
            <div class="nav-links">
                <a href="{{route('welcome')}}" class="navLink active">{{$home_page->title}}</a>
                <a href="{{route('welcome')}}#about_section" class="navLink">{{$words['about']->translate(app()->getLocale())->title}}</a>
                <a href="{{route('welcome')}}#service_section" class="navLink">{{$words['services']->translate(app()->getLocale())->title}}</a>
                <a href="{{route('welcome')}}#advantages_section" class="navLink">{{$words['advantages']->translate(app()->getLocale())->title}}</a>
                <a href="{{route('welcome')}}#partners" class="navLink">{{$words['partners']->translate(app()->getLocale())->title}}</a>
                <a href="{{route('dynamic.page', $news_page->slug)}}" class="navLink">{{$news_page->title}}</a>
                <a href="{{route('dynamic.page', $contact_page->slug)}}" class="navLink">{{$contact_page->title}}</a>
            </div>
            @if(count($locales = LaravelLocalization::getSupportedLocales()) > 1)
                <div class="nav_lang">
                    <button class="current_lang" type="button">
                        @php
                            $currentLocale = App::getLocale();
                            $currentLocaleFlag = asset('front/icons/' . $currentLocale . '_flag.svg');
                        @endphp
                        <img src="{{ $currentLocaleFlag }}" alt="{{ strtoupper($currentLocale) }}">
                        {{ strtoupper($currentLocale) }}
                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.5L6 6.5L11 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <div class="other_langs">
                        @foreach($locales as $localeCode => $properties)
                            @if($localeCode !== $currentLocale)
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="other_lang">
                                    <img src="{{ asset('front/icons/' . $localeCode . '_flag.svg') }}" alt="{{ strtoupper($localeCode) }}">
                                    {{ strtoupper($localeCode) }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            <button class="hamburger" type="button">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_93_201)">
                        <path d="M4 6H20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 12H20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10 18H20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_93_201">
                            <rect width="24" height="24" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>
    </div>
</nav>
<div class="mobile_menu">
    <div class="mobile_menu_top">
        <a href="{{route('welcome')}}" class="mobile-logo">
            <img src="{{asset('/')}}front/image/nav_logo.png" alt="">
        </a>

        <button class="close-menu" type="button">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_93_1980)">
                    <path d="M18 6L6 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 6L18 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <clipPath id="clip0_93_1980">
                        <rect width="24" height="24" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </button>
    </div>
    <div class="mobile_menu_links">
        <a href="{{route('welcome')}}" class="mobile_menu_link">{{$home_page->title}}</a>
        <a href="{{route('welcome')}}#about_section" class="mobile_menu_link">{{$words['about']->translate(app()->getLocale())->title}}</a>
        <a href="{{route('welcome')}}#service_section" class="mobile_menu_link">{{$words['services']->translate(app()->getLocale())->title}}</a>
        <a href="{{route('welcome')}}#advantages_section" class="mobile_menu_link">{{$words['advantages']->translate(app()->getLocale())->title}}</a>
        <a href="{{route('welcome')}}#partners" class="mobile_menu_link">{{$words['partners']->translate(app()->getLocale())->title}}</a>
        <a href="{{route('dynamic.page', $news_page->slug)}}" class="mobile_menu_link">{{$news_page->title}}</a>
        <a href="{{route('dynamic.page', $contact_page->slug)}}" class="mobile_menu_link">{{$contact_page->title}}</a>
    </div>
    @if(count($locales = LaravelLocalization::getSupportedLocales()) > 1)
        <div class="nav_lang">
            <button class="current_lang" type="button">
                @php
                    $currentLocale = App::getLocale();
                    $currentLocaleFlag = asset('front/icons/' . $currentLocale . '_flag.svg');
                @endphp
                <img src="{{ $currentLocaleFlag }}" alt="{{ strtoupper($currentLocale) }}">
                {{ strtoupper($currentLocale) }}
                <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.5L6 6.5L11 1.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="other_langs">
                @foreach($locales as $localeCode => $properties)
                    @if($localeCode !== $currentLocale)
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="other_lang">
                            <img src="{{ asset('front/icons/' . $localeCode . '_flag.svg') }}" alt="{{ strtoupper($localeCode) }}">
                            {{ strtoupper($localeCode) }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

</div>
