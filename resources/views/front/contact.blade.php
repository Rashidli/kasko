@extends('front.layouts.master')

@section('title', $contact_page->seo_title)
@section('description', $contact_page->seo_description)
@section('keywords', $contact_page->seo_keywords)

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
            {{$contact_page->title}}
        </a>
    </div>
    <div class="contact-container p-lr">
        <h1 class="title">{{$words['us_contact']->translate(app()->getLocale())->title}}</h1>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d759.6170984303069!2d49.876759526680594!3d40.398473288443846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d37bfc245e1%3A0x97221e340d2745e3!2zQXJpZiBIZXlkyZlyb3YsIEJha8Sx!5e0!3m2!1saz!2saz!4v1720152525202!5m2!1saz!2saz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact-main">
            <div class="contact-info">
                <h2 class="contact-info-title">{{$words['contact_info']->translate(app()->getLocale())->title}}</h2>
                <div class="contact-items">
                    @foreach($contact_items as $contact_item)
                        <div class="contact-item">
                            <div class="icon">
                                <img src="{{asset('storage/' . $contact_item->image)}}" alt="icon" title="icon">
                            </div>
                            <div class="item-info">
                                <span>{{$contact_item->title}}</span>
                                <a >{{$contact_item->value}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="contact-socials">
                    <p>{{$words['follow_us']->translate(app()->getLocale())->title}}</p>
                    <div class="socials-links">
                        @foreach($socials as $social)
                            <a href="{{$social->link}}" class="socials-link">
                                <img src="{{asset('storage/' . $social->image)}}" alt="{{$social->title}}" title="{{$social->title}}">
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="contact-form">
                <h2 class="contact-form-title">{{$words['question']->translate(app()->getLocale())->title}}</h2>
                <form action="{{route('contact_post')}}" method="post">
                    @csrf
                    <input type="text" required name="name" placeholder="{{$words['fullname']->translate(app()->getLocale())->title}}">
                    <input type="email" name="email" placeholder="{{$words['email']->translate(app()->getLocale())->title}}">
                    <div class="form_phone">
                        <select name="prefix" >
                            <option value="050">050</option>
                            <option value="051">051</option>
                            <option value="055">055</option>
                            <option value="070">070</option>
                            <option value="099">099</option>
                            <option value="010">010</option>
                        </select>
                        <input type="number" required name="phone" placeholder="00 000 00 00">
                    </div>
                    <textarea name="message" required id="" placeholder="{{$words['note']->translate(app()->getLocale())->title}}:"></textarea>
                    <button class="send-form" type="submit">{{$words['send']->translate(app()->getLocale())->title}}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
