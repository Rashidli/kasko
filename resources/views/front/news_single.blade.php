@extends('front.layouts.master')

@section('title', $blog->seo_title)
@section('description', $blog->seo_description)
@section('keywords', $blog->seo_keywords)

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
        <h1 class="title_news_name">{{$blog->title}}</h1>
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
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" class="share-link fb" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('front/icons/fb.svg') }}" alt="Facebook">
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}" class="share-link wp" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('front/icons/wp.svg') }}" alt="WhatsApp">
                        </a>
                        <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}" class="share-link tg" target="_blank" rel="noopener noreferrer">
                            <img src="{{ asset('front/icons/tg.svg') }}" alt="Telegram">
                        </a>

                        <button class="share-link simply_link" type="button">
                            <img src="{{asset('/')}}front/icons/link.svg" alt="link" title="link">
                            <span class="copied_text">{{$words['make_copy']->translate(app()->getLocale())->title}}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="get-an-offer">
                <h2>{{$words['take_offer']->translate(app()->getLocale())->title}}</h2>
{{--                <p>Lorem Ipsum is simply dummy text of the printing and typesetting .</p>--}}
                <div class="offer-items">
                    @foreach($blog->services as $service)
                        <a href="{{route('dynamic.page',$service->slug)}}" class="offer-item">
                            <div class="offer-item-left">
                                <div class="icon">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_132_3569)">
                                            <path d="M4.16669 16.6667C4.16669 17.1087 4.34228 17.5326 4.65484 17.8452C4.9674 18.1577 5.39133 18.3333 5.83335 18.3333C6.27538 18.3333 6.6993 18.1577 7.01186 17.8452C7.32443 17.5326 7.50002 17.1087 7.50002 16.6667C7.50002 16.2246 7.32443 15.8007 7.01186 15.4882C6.6993 15.1756 6.27538 15 5.83335 15C5.39133 15 4.9674 15.1756 4.65484 15.4882C4.34228 15.8007 4.16669 16.2246 4.16669 16.6667Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12.5 16.6667C12.5 17.1087 12.6756 17.5326 12.9882 17.8452C13.3007 18.1577 13.7246 18.3333 14.1667 18.3333C14.6087 18.3333 15.0326 18.1577 15.3452 17.8452C15.6577 17.5326 15.8333 17.1087 15.8333 16.6667C15.8333 16.2246 15.6577 15.8007 15.3452 15.4882C15.0326 15.1756 14.6087 15 14.1667 15C13.7246 15 13.3007 15.1756 12.9882 15.4882C12.6756 15.8007 12.5 16.2246 12.5 16.6667Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M4.16667 16.6667H2.5V11.6667M2.5 11.6667L4.16667 7.5H11.6667L15 11.6667M2.5 11.6667H15M15 11.6667H15.8333C16.2754 11.6667 16.6993 11.8423 17.0118 12.1548C17.3244 12.4674 17.5 12.8913 17.5 13.3333V16.6667H15.8333M12.5 16.6667H7.5M10 11.6667V7.5" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M2.5 5.00002L10 1.66669L17.5 5.00002" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_132_3569">
                                                <rect width="20" height="20" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
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
                            <p>{!! $item->description !!}</p>
                            <div class="body-bottom">
                                <span class="news_time">{{$item->created_at->format('d.m.Y')}}</span>
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
