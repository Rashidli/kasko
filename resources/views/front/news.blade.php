@extends('front.layouts.master')

@section('title', $news_page->seo_title)
@section('description', $news_page->seo_description)
@section('keywords', $news_page->seo_keywords)

@section('content')

    <!--<div class="page-direction p-lr">-->
    <!--    <a href="{{route('welcome')}}" class="prev-page">-->
    <!--        {{$home_page->title}}-->
    <!--    </a>-->
    <!--    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--        <g clip-path="url(#clip0_171_1378)">-->
    <!--            <path d="M4.1665 10H15.8332" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
    <!--            <path d="M12.5 13.3333L15.8333 10" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
    <!--            <path d="M12.5 6.66666L15.8333 9.99999" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>-->
    <!--        </g>-->
    <!--        <defs>-->
    <!--            <clipPath id="clip0_171_1378">-->
    <!--                <rect width="20" height="20" fill="white"/>-->
    <!--            </clipPath>-->
    <!--        </defs>-->
    <!--    </svg>-->
    <!--    <a href="javascript: void(0)" class="current-page">-->
    <!--        {{$news_page->title}}-->
    <!--    </a>-->
    <!--</div>-->
    <section class="lastest-news-boxes p-lr">
        <h1 class="title">{{$words['newest_news']->translate(app()->getLocale())->title}}</h1>
        <div class="lastest_news swiper">
            <div class="swiper-wrapper">
                @foreach($new_blogs as $new_blog)
                    <a href="{{route('dynamic.page', $new_blog->slug)}}" class="lastest_news_item swiper-slide">
                        <img src="{{asset('storage/' . $new_blog->image)}}" alt="{{$new_blog->img_alt}}" title="{{$new_blog->img_title}}">
                        <div class="item-body-container">
                            <div class="item-body">
                                <h2>{{$new_blog->title}}</h2>
                                <div class="item-body-bottom">
                                    <div class="time_view">
                                        <div class="news_time">
                                        <i class="bi bi-calendar3"></i>
                                            <span>{{$new_blog->created_at->format('d.m.Y')}}</span>
                                        </div>

                                        <div class="news_view">
                                            <i class="bi bi-eye"></i>
                                            <span>{{$new_blog->views_count}}</span>
                                        </div>
                                    </div>
                                    <span class="more">
                                        {{$words['more']->translate(app()->getLocale())->title}}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </a>
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
    </section>
    <section class="all-news-boxes p-lr">
        <h2>{{$words['other_news']->translate(app()->getLocale())->title}}</h2>
        <div class="news-boxes">
            @foreach($blogs as $blog)
                <a href="{{route('dynamic.page',$blog->slug)}}" class="news-cart">
                    <div class="news-cart-img">
                        <img src="{{asset('storage/' . $blog->image)}}" alt="{{$blog->img_alt}}" title="{{$blog->img_title}}" loading="lazy">
                    </div>
                    <div class="news-cart-body">
                        <h3>{{$blog->title}}</h3>
                        <!-- <p>{{$blog->short_description}}</p> -->
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
                    </div>
                </a>
            @endforeach
        </div>
{{--        <a href="" class="more_all_news">Daha çox</a>--}}
    </section>


@endsection
