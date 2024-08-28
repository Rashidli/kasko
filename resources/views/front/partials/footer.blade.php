<footer>
    <div class="footer-inner p-lr">
        <div class="footer-sections">
            <div class="footer-section">
                <button class="footer-section-title" type="button">
                    {{$words['useful_links']->translate(app()->getLocale())->title}}
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="footer-section-links">
                    @foreach($links as $link)
                        <a href="{{route('dynamic.page',$link->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$link->title}}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="footer-section">
                <button class="footer-section-title" type="button">
                    {{$words['useful_info']->translate(app()->getLocale())->title}}
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="footer-section-links">
                    @foreach($contents as $content)
                        <a href="{{route('dynamic.page',$content->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$content->title}}
                        </a>
                    @endforeach

                    <a href="{{route('dynamic.page',$faq_page->slug)}}" class="footer-section-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_71_666)">
                                <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_71_666">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        {{$faq_page->title}}
                    </a>
                </div>
            </div>
            <div class="footer-section">
                <button class="footer-section-title" type="button">
                    {{$words['law']->translate(app()->getLocale())->title}}
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="footer-section-links">
                    <a href="{{route('sigorta_qanunu')}}" class="footer-section-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_71_666)">
                                <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_71_666">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        Siğorta haqqında qanun
                    </a>
                    <a href="{{route('dovlet_qulluqculari')}}" class="footer-section-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_71_666)">
                                <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_71_666">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                       Dövlət qulluğu haqqında qanun
                    </a>
                    <a href="{{route('icbari_sigorta_qanun')}}" class="footer-section-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_71_666)">
                                <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_71_666">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        İcbari siğorta haqqında qanun
                    </a>
                    <a href="{{route('inzibati_xetalar_mecellesi')}}" class="footer-section-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_71_666)">
                                <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_71_666">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        İnzibati xətalar məcəlləsi
                    </a>
                    <a href="{{route('tibbi_sigorta_qanun')}}" class="footer-section-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_71_666)">
                                <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_71_666">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        Tibbi siğorta haqqında qanun
                    </a>
                    <a href="{{route('sigorta_beledcisi')}}" class="footer-section-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_71_666)">
                                <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_71_666">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        Siğorta bələdçisi
                    </a>
                </div>
            </div>
            <div class="footer-contact">
                <h4 class="footer-contact-title">{{$words['contact_info']->translate(app()->getLocale())->title}}</h4>
                <div class="footer-contact-items">
                    @foreach($contact_items as $contact_item)
                        <a  class="footer-contact-item">
                            <img src="{{asset('storage/' . $contact_item->footer_icon)}}" alt="{{$contact_item->value}}" title="{{$contact_item->value}}">
                            {{$contact_item->value}}
                        </a>
                    @endforeach
                </div>
                <h4 class="footer-social-title">{{$words['follow_us']->translate(app()->getLocale())->title}}</h4>
                <div class="footer-socials">
                    @foreach($socials as $social)
                        <a href="{{$social->link}}" class="social_item">
                            <img src="{{asset('storage/' . $social->image)}}" alt="{{$social->title}}" title="{{$social->title}}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>©2024 | <a href="javascript: void(0)">kasko.az</a></p>
        </div>
    </div>
</footer>

<script src="{{asset('/')}}front/jquery-nice-select-1.1.0/js/jquery.js"></script>
<script src="{{asset('/')}}front/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js"></script>
<script src="{{asset('/')}}front/swiper/swiper.js"></script>
<script src="{{asset('/')}}front/js/index.js?v={{time()}}"></script>


<script>
    $(document).ready(function () {
        $('select').niceSelect()
    })

</script>
</body>
</html>
