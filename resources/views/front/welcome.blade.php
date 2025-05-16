@extends('front.layouts.master')

@section('title', $home_page->seo_title)
@section('description', $home_page->seo_description)
@section('keywords', $home_page->seo_keywords)
@section('image','https://kasko.az/storage/ab3884ff-88c3-4019-a5b0-cc3f67a2005c.webp')
{{--@section('image',asset('/') .'front/image/2a162563-bc9c-4ba8-8426-30acfd0497a9.jpg')--}}
@section('content')

<section class="home-hero-slide swiper">
    <div class="swiper-wrapper">
        @foreach($mains as $main)
            <div class="swiper-slide home-hero-item">
                <div class="gradient"></div>
                <!-- Slide-da desktop sekil -->
                <img class="hero_img_desktop" src="{{asset('storage/' . $main->image)}}" alt="{{$main->img_alt}}" title="{{$main->img_title}}" loading="lazy">
                <!-- Slide-da mobil sekil -->
                <img class="hero_img_mobile" src="{{asset('storage/' . $main->mobile_image)}}" alt="{{$main->img_alt}}" title="{{$main->img_title}}" loading="lazy">
                <div class="home-hero-content p-lr">
                    @if($main->type == 'h1')
                        <h1 class="title">{{$main->title}}</h1>
                    @else
                        <h2 class="title">{{$main->title}}</h2>
                    @endif
                    <p>{{$main->description}}</p>
                    <a href="{{$main->link}}" class="now_apply">{{$words['apply']->translate(app()->getLocale())->title}}</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</section>
<section class="home-service p-lr" id="service_section">
    <p class="title">{{$words['offers']->translate(app()->getLocale())->title}}</p>
    <div class="home-service-boxes">
        @foreach($categories as $category)
            <div class="home-service-box">
                <div class="boxleft">
                    <span class="line"></span>
                    <div class="boxleft-icon">
                        <img src="{{asset('storage/' . $category->image)}}" alt="{{$category->title}}" title="{{$category->title}}" width="44" height="44">
                    </div>
                    <span class="line"></span>
                </div>
                <div class="boxright">
                    <h2 class="box_name">{{$category->title}}</h2>
                    <div class="box_links">
                        @foreach($category->services as $service)
                            <h3><a href="{{route('dynamic.page',$service->slug)}}">{{$service->title}}</a></h3>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<section class="home-about" id="about_section">
    <div class="home-about-inner">
        <div class="home-about-content">
            <div class="home-about-content-left">
                <p class="small-title">{{$about->short_title}}</p>
                <h2 class="title">{{$about->title}}</h2>
                <div class="home-about-text">
                    <p>{!! $about->description !!}</p>
                </div>
                <a href="{{route('dynamic.page',$about_page->slug)}}" class="about_more_link">Daha ətraflı</a>
            </div>
            <div class="home-about-img">
                <img src="{{asset('storage/' . $about->image)}}" alt="{{$about->img_alt}}" title="{{$about->img_title}}">
            </div>
        </div>
        <div class="home-statistics">
            @foreach($statistics as $statistic)
                <div class="statistic-item">
                    <span>{{$statistic->title}}</span>
                    <p>{{$statistic->description}}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="home-advantages p-lr" id="advantages_section">
    <p class="small-title">{{$words['what_offers']->translate(app()->getLocale())->title}}</p>
    <p class="title">{{$words['advantages']->translate(app()->getLocale())->title}}</p>
    <div class="advantages-boxes">
        @foreach($advantages as $advantage)
            <div class="advantages-box">
                <div class="advantages-box-inner">
                    <div class="advantage-icon">
                        <img src="{{asset('storage/' . $advantage->image)}}" alt="{{$advantage->img_alt}}" title="{{$advantage->img_title}}">
                    </div>
                   <div class="advantage-content">
                    <p class="advantage-name">{{$advantage->title}}</p>
                    <p class="advantage-desc">{{$advantage->description}}</p>
                   </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<section class="home-news p-lr">
    <div class="home-news-top">
        <div class="home-news-top-left">
            <p class="small-title">{{$words['last_news']->translate(app()->getLocale())->title}}</p>
            <h2 class="title">{{$news_page->title}}</h2>
        </div>
        <a href="{{route('dynamic.page', $news_page->slug)}}" class="all_news">{{$words['all_news']->translate(app()->getLocale())->title}}</a>
    </div>
    <div class="home-news-slide swiper">
        <div class="swiper-wrapper">
            @foreach($blogs as $blog)
                <div  class="news-cart swiper-slide">
                    <a href="{{route('dynamic.page', $blog->slug)}}" class="news-cart-img">
                        <img src="{{asset('storage/' . $blog->image)}}" alt="{{$blog->img_alt}}" title="{{$blog->img_title}}">
                    </a>
                    <a href="{{route('dynamic.page', $blog->slug)}}" class="news-cart-body">
                        <h3>{{$blog->title}}</h3>
                        <!-- <p>{{$blog->short_description}} </p> -->
                        <div class="body-bottom">
                            <div class="time_view">
                                <div class="news_time">
                                    <i class="bi bi-calendar3"></i>
                                    <span>{{$blog->created_at->format('d.m.Y')}}</span>
                                </div>
                                <div class="news_view">
                                    <i class="bi bi-eye"></i>
                                    <span>{{$blog->views_count}}</span>

                                </div>
                            </div>
                            <span class="news_more">{{$words['more']->translate(app()->getLocale())->title}}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_71_844)">
                    <path d="M5 12H19" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 8L19 12" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 16L19 12" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <clipPath id="clip0_71_844">
                        <rect width="24" height="24" fill="white" transform="matrix(0 -1 1 0 0 24)"/>
                    </clipPath>
                </defs>
            </svg>

        </div>
        <div class="swiper-button-prev">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_71_837)">
                    <path d="M19 12L5 12" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 16L5 12" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 8L5 12" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <clipPath id="clip0_71_837">
                        <rect width="24" height="24" fill="white" transform="matrix(0 1 -1 0 24 0)"/>
                    </clipPath>
                </defs>
            </svg>

        </div>
    </div>
    <a href="{{route('dynamic.page',$news_page->slug)}}" class="mobile_all_news">{{$words['all_news']->translate(app()->getLocale())->title}}</a>
</section>
<section class="home-partners p-lr" id="partners">
    <p class="small-title">{{$words['connect_partners']->translate(app()->getLocale())->title}}</p>
    <p class="title">{{$words['partners']->translate(app()->getLocale())->title}}</p>
    <div class="home-partners-items">
        @foreach($partners as $partner)
            <div class="partner-item">
                <img src="{{asset('storage/' . $partner->image)}}" alt="{{$partner->img_alt}}" title="{{$partner->img_title}}" width="136" height="70" loading="lazy">
            </div>
        @endforeach
    </div>
</section>


@endsection
