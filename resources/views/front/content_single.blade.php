@extends('front.layouts.master')

@section('title', $content->meta_title)
@section('description', $content->meta_description)
@section('keywords', $content->meta_keywords)
@section('image', asset('storage/' . $content->image))
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
{{$content->title}}
    </a>
</div> -->
    <div class="information-container p-lr">
        <h1 class="title">{{$content->title}}</h1>
        <div class="information-inner">
            <div class="insurance_info">
                <div class="insurance_info_img">
                    <img src="{{asset('storage/' . $content->image)}}" alt="info" title="info">
                </div>
                <div class="insurance_info_content">
                    {!! $content->description !!}
                </div>
                @if($content->link)
                    <a href="{{$content->link}}"
                       class="now-order">{{$words['now_order']->translate(app()->getLocale())->title}}</a>
                @endif
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
            <div class="useful_info_box">
                <button class="useful_info_btn" type="button">
                    {{$words['useful_info']->translate(app()->getLocale())->title}}
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_309_3985)">
                            <path d="M9 6L15 12L9 18" stroke="#000" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_309_3985">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </button>
                <div class="useful_info_list">
                    @foreach($contents as $item)
                        <a href="{{route('dynamic.page',$item->slug)}}"
                           class="useful_info_link {{ request()->is('dynamic.page/'.$content->slug) ? 'active' : '' }}">
                            {{$item->title}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_309_3977)">
                                    <path d="M9 6L15 12L9 18" stroke="#0A2056" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_309_3977">
                                        <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    @endforeach
                    <a href="{{route('dynamic.page',$faq_page->slug)}}"
                       class="useful_info_link {{ request()->is('dynamic.page/'.$faq_page->slug) ? 'active' : '' }}">
                        {{$faq_page->title}}
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_309_3977)">
                                <path d="M9 6L15 12L9 18" stroke="#0A2056" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_309_3977">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
