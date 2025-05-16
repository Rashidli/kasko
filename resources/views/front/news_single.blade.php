@extends('front.layouts.master')

@section('title', $blog->meta_title)
@section('description', $blog->meta_description)
@section('keywords', $blog->meta_keywords)
@section('image', asset('storage/' . $blog->image))
@section('schema')
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BlogPosting",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{route('dynamic.page', $blog->slug)}}"
      },
      "headline": "{{$blog->title}}",
      "image": "{{asset('storage/' . $blog->image)}}",
      "author": {
        "@type": "Organization",
        "name": "Kasko"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Kasko",
        "logo": {
          "@type": "ImageObject",
          "url": "https://kasko.az/storage/5ad973c7-eb3a-4355-a64c-f50e25359311.svg"
        }
      },
      "datePublished": "{{$blog->created_at}}"
    }
    </script>
@endsection

@section('content')

    <div class="page-direction p-lr">
        <a href="{{route('welcome')}}" class="prev-page">
            {{$home_page->title}}
        </a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_171_1378)">
                <path d="M4.1665 10H15.8332" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.5 13.3333L15.8333 10" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.5 6.66666L15.8333 9.99999" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
                <clipPath id="clip0_171_1378">
                    <rect width="20" height="20" fill="white"/>
                </clipPath>
            </defs>
        </svg>
        <a href="{{route('dynamic.page', $news_page->slug)}}" class="prev-page">
            {{$news_page->title}}
        </a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_171_1378)">
                <path d="M4.1665 10H15.8332" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.5 13.3333L15.8333 10" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.5 6.66666L15.8333 9.99999" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
                <clipPath id="clip0_171_1378">
                    <rect width="20" height="20" fill="white"/>
                </clipPath>
            </defs>
        </svg>
        <a href="javascript: void(0)" class="current-page">
            {{$blog->title}}
        </a>
    </div>
    <div class="news-detail-container p-lr">

        <div class="news-detail-main">
            <div class="news-detail-inner">

                <div class="news-detail-slide swiper">
                    <div class="swiper-wrapper">
                        @foreach($blog->sliders as $slider)
                            <div class="news-detail-slide-img swiper-slide">
                                <img src="{{asset('storage/' . $slider->image)}}" alt="{{$blog->img_alt}}" title="{{$blog->img_title}}">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <!-- <div class="swiper-button-next">
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
                    </div> -->
                </div>
                <div class="news-time">
                    <p>
                        <i class="bi bi-calendar3"></i>
                        {{$blog->created_at->format('d.m.Y')}}
                    </p>
                    <p>
                        <i class="bi bi-eye"></i>
                        {{$blog->views_count}}
                    </p>
                </div>
                <br>
                <h1 class="title_news_name">{{$blog->title}}</h1>
                <div class="news-detail-texts">
                    {!! $blog->description !!}
                </div>
{{--                <div class="news-detail-img">--}}
{{--                    <img src="{{asset('/storage' . $blog->image)}}" alt="{{$blog->img_alt}}" title="{{$blog->img_title}}">--}}
{{--                </div>--}}
{{--                <div class="news-detail-texts">--}}
{{--                    {!!  !!}--}}
{{--                </div>--}}
                <div class="general-share">
                    <p>{{$words['share']->translate(app()->getLocale())->title}}:</p>
                    <div class="share-links">
                        @foreach($share_icons as $share_icon)
                            <a href="{{ $share_icon->link . urlencode(url()->current()) }}" class="share-link fb"
                               target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('storage/' . $share_icon->image) }}" alt="Facebook">
                            </a>
                        @endforeach
                        <button class="share-link simply_link" type="button">
                            <img src="{{asset('/')}}front/icons/link.svg" alt="link" title="link">
                            <span
                                class="copied_text">{{$words['make_copy']->translate(app()->getLocale())->title}}</span>
                        </button>

                    </div>
                </div>
{{--                <div class="general-share">--}}
{{--                    <p>{{$words['share']->translate(app()->getLocale())->title}}:</p>--}}
{{--                    <div class="share-links">--}}
{{--                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" class="share-link fb" target="_blank" rel="noopener noreferrer">--}}
{{--                            <img src="{{ asset('front/icons/fb.svg') }}" alt="Facebook">--}}
{{--                        </a>--}}
{{--                        <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}" class="share-link wp" target="_blank" rel="noopener noreferrer">--}}
{{--                            <img src="{{ asset('front/icons/wp.svg') }}" alt="WhatsApp">--}}
{{--                        </a>--}}
{{--                        <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}" class="share-link tg" target="_blank" rel="noopener noreferrer">--}}
{{--                            <img src="{{ asset('front/icons/tg.svg') }}" alt="Telegram">--}}
{{--                        </a>--}}

{{--                        <button class="share-link simply_link" type="button">--}}
{{--                            <img src="{{asset('/')}}front/icons/link.svg" alt="link" title="link">--}}
{{--                            <span class="copied_text">{{$words['make_copy']->translate(app()->getLocale())->title}}</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="news-detail-right">
                <div class="get-an-offer">
                    <h2>{{$words['take_offer']->translate(app()->getLocale())->title}}</h2>
                    <p>{{$blog->short_text}}</p>
                    <div class="offer-items">
                        @foreach($blog->services as $service)
                            <a href="{{route('dynamic.page',$service->slug)}}" class="offer-item">
                                <div class="offer-item-left">
                                    <div class="icon">
                                        @if($service->icon)
                                            <img src="{{asset('storage/' . $service->icon)}}" alt="{{$service->title}}" title="{{$service->title}}">
                                        @endif
                                    </div>
                                    <p>{{$service->title}}</p>
                                </div>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_132_3586)">
                                        <path d="M9 6L15 12L9 18" stroke="#0A2056" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_132_3586">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </a>
                        @endforeach
                    </div>
                </div>
                @if($banner)
                    <div class="reklam-banner">
                        <a href="{{$banner->link}}"><img src="{{asset('storage/' . $banner->banner)}}" alt="" class="desktop_banner"></a>
                    </div>
                @endif
            </div>
        </div>

    </div>
    <div class="most-read-news-container p-lr">
        <h2 class="title">{{$words['most_viewed_news']->translate(app()->getLocale())->title}}</h2>
        <div class="most-read-news-swiper swiper">
            <div class="swiper-wrapper">
                @foreach($blogs as $item)
                    <a href="{{route('dynamic.page',$item->slug)}}" class="news-cart swiper-slide">
                        <div class="news-cart-img">
                            <img src="{{asset('storage/' . $item->image)}}" alt="{{$item->img_alt}}" title="{{$item->img_title}}">
                        </div>
                        <div class="news-cart-body">
                            <h3>{{$item->title}}</h3>
                            <!-- <p>{{$item->short_description}}</p> -->
                            <div class="body-bottom">
                                <div class="time_view">
                                    <div class="news_time">
                                        <i class="bi bi-calendar3"></i>
                                        <span>{{$item->created_at->format('d.m.Y')}}</span>
                                    </div>
                                    <div class="news_view">
                                        <i class="bi bi-eye"></i>
                                        <span>{{$item->views_count}}</span>

                                    </div>
                                </div>
                                <span class="news_more">{{$words['more']->translate(app()->getLocale())->title}}</span>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
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
    </div>


@endsection
