@extends('front.layouts.master')

@section('title', $link->seo_title)
@section('description', $link->seo_description)
@section('keywords', $link->seo_keywords)

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
        <a href="javascript: void(0)" class="current-page">
            {{$link->title}}
        </a>
    </div>
    <div class="useful_link_head p-lr">
        <h1 class="title">{{$link->title}}</h1>
    </div>
    <div class="useful_link_container p-lr">
        {!! $link->description !!}
    </div>

@endsection
