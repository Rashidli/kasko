@extends('front.layouts.master')

@section('title', $about_page->seo_title)
@section('description', $about_page->seo_description)
@section('keywords', $about_page->seo_keywords)

@section('content')

    <!-- <div class="page-direction p-lr">
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
        <a href="javascript: void(0)" class="current-page">
            {{$about_page->title}}
        </a>
    </div> -->
    <div class="about-container p-lr">
        <h1 class="title">{{$about->title}}</h1>
        <div class="about-text">
            <p>{!! $about->description !!}</p>
        </div>
        <div class="about-img">
            <img src="{{asset('storage/' . $about->image)}}" alt="">
        </div>
        <div class="home-advantages">
            <h2 class="title">{{$words['advantages']->translate(app()->getLocale())->title}}</h2>
            <div class="advantages-boxes">
                @foreach($advantages as $advantage)
                    <div class="advantages-box">
                        <div class="advantages-box-inner">
                            <div class="advantage-icon">
                                <img src="{{asset('storage/' . $advantage->image)}}" alt="{{$advantage->img_alt}}" title="{{$advantage->img_title}}">
                            </div>
                           <div class="advantage-content">
                                <h3 class="advantage-name">{{$advantage->title}}</h3>
                            <p>{{$advantage->description}}</p>
                           </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="faq">
            <h2 class="title">{{$faq_page->title}}</h2>
            <div class="faq-items">
                @foreach($faqs as $key => $faq)
                    <div class="faq-item">
                        <button class="accordion-title" type="button">
                            <div class="accordion-title-left">
                                <span class="accordion-count">{{$key+1}}.</span>
                                <p>{{$faq->title}}</p>
                            </div>
                            <div class="acc_icon">
                                <i class="bi bi-plus"></i>
                            </div>
                        </button>
                        <div class="acc-answer">
                            <p>{{$faq->description}}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="home-partners">
            <h2 class="title">{{$words['partners']->translate(app()->getLocale())->title}}</h2>
            <div class="home-partners-items">
                @foreach($partners as $partner)
                    <div class="partner-item">
                        <img src="{{asset('storage/' . $partner->image)}}" alt="{{$partner->img_alt}}" title="{{$partner->img_title}}">
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
