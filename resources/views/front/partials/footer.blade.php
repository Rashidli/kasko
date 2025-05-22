<footer>
    <div class="footer-inner p-lr">
        <div class="footer-sections">
            <div class="footer-section">
                <h4 class="footer-section-title">
                    {{$words['useful_links']->translate(app()->getLocale())->title}}
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </h4>
                <div class="footer-section-links">
                    @foreach($links as $link)
                    <h5>
                        <a href="{{route('dynamic.page',$link->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$link->title}}
                        </a>
                    </h5>
                    @endforeach
                    <h5>
                        <a href="{{route('dynamic.page', $icbari_sigorta_kalkulyatoru->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$icbari_sigorta_kalkulyatoru->title}}
                        </a>
                    </h5>
                    <h5>
                        <a href="{{route('dynamic.page',$customs_caclulator->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$customs_caclulator->title}}
                        </a>
                    </h5>
                    <h5>
                        <a href="{{route('dynamic.page',$casco_calculator->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$casco_calculator->title}}
                        </a>
                    </h5>
                    <h5>
                        <a href="{{route('dynamic.page',$green_card_calculator->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$green_card_calculator->title}}
                        </a>
                    </h5>
                </div>
            </div>
            <div class="footer-section">
                <h4 class="footer-section-title">
                    {{$words['useful_info']->translate(app()->getLocale())->title}}
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </h4>
                <div class="footer-section-links">
                    @foreach($contents as $content)
                        <h5>
                            <a href="{{route('dynamic.page',$content->slug)}}" class="footer-section-link">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_71_666)">
                                        <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_71_666">
                                            <rect width="20" height="20" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                {{$content->title}}
                            </a>
                        </h5>
                    @endforeach
                    <h5>
                        <a href="{{route('dynamic.page',$faq_page->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$faq_page->title}}
                        </a>
                    </h5>
                </div>
            </div>
            <div class="footer-section">
                <h4 class="footer-section-title">
                    {{$words['law']->translate(app()->getLocale())->title}}
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L13 1" stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </h4>
                <div class="footer-section-links">
                    <h5>
                        <a target="_blank" href="{{route('dynamic.page',$sigorta_fealiyeti_haqqinda_qanun->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$sigorta_fealiyeti_haqqinda_qanun->title}}
                        </a>
                    </h5>
                    <h5>
                        <a target="_blank" href="{{route('dynamic.page',$icbari_sigortalar_haqqinda_qanun->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$icbari_sigortalar_haqqinda_qanun->title}}
                        </a>
                    </h5>
                    <h5>
                        <a target="_blank" href="{{route('dynamic.page',$tibbi_sigorta_haqqinda_qanun->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$tibbi_sigorta_haqqinda_qanun->title}}
                        </a>
                    </h5>
                    <h5>
                        <a target="_blank" href="{{route('dynamic.page',$dq_nin_is_haqqinda_qanun->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$dq_nin_is_haqqinda_qanun->title}}
                        </a>
                    </h5>
                    <h5>
                        <a target="_blank" href="{{route('dynamic.page',$inzibati_xetalar_mecellesi->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$inzibati_xetalar_mecellesi->title}}
                        </a>
                    </h5>
                    <h5>
                        <a target="_blank" href="{{route('dynamic.page',$kasko_sigorta_qaydalar->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$kasko_sigorta_qaydalar->title}}
                        </a>
                    </h5>
                    <h5>
                        <a target="_blank" href="{{route('dynamic.page',$sigorta_beledcisi->slug)}}" class="footer-section-link">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_71_666)">
                                    <path d="M4.16669 10H15.8334" stroke="#FF632D" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M12.5 13.3333L15.8333 10" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.5 6.66675L15.8333 10.0001" stroke="#FF632D" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_71_666">
                                        <rect width="20" height="20" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            {{$sigorta_beledcisi->title}}
                        </a>
                    </h5>
                </div>
            </div>
            <div class="footer-contact">
                <h4 class="footer-contact-title">{{$words['contact_info']->translate(app()->getLocale())->title}}</h4>
                <div class="footer-contact-items">
                    @foreach($contact_items as $contact_item)
                        <a href="{{$contact_item->id == 3 ? 'mailto:' : 'tel:'}}{{$contact_item->value}}"
                           class="footer-contact-item">
                            <img width="24" height="24" src="{{asset('storage/' . $contact_item->footer_icon)}}"
                                 alt="{{$contact_item->value}}" title="{{$contact_item->value}}">
                            {{$contact_item->value}}
                        </a>
                    @endforeach
                </div>
                <p class="footer-social-title">{{$words['follow_us']->translate(app()->getLocale())->title}}</p>
                <div class="footer-socials">
                    @foreach($socials as $social)
                        <a rel="nofollow" href="{{$social->link}}" class="social_item">
                            <img width="36" height="36" src="{{asset('storage/' . $social->image)}}"
                                 alt="{{$social->title}}" title="{{$social->title}}">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© {{date('Y')}} | <a href="https://www.kasko.az/">kasko.az</a></p>
        </div>
    </div>
</footer>

@if(!$contents->contains('slug', Route::current()->parameter('slug')) && !$singles->contains('slug', Route::current()->parameter('slug')) &&  !$footer_blogs->contains('slug', Route::current()->parameter('slug')))
    @if($contact_social = $contact_socials->firstWhere('id', 5))
        <div class="fixed_text">
            <div>
                {{ $contact_social->title }}
            </div>
        </div>
    @endif
    <btn class="fixed_message" type="button">
        <svg class="iconMsg" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
            <script xmlns="" id="eppiocemhmnlbhjplcgkofciiegomcon"/>
            <script xmlns=""/>
            <script xmlns=""/>
            <circle cx="30" cy="30" r="30" fill="#008bd0"/>
            <path
                d="M30.7385 18.4203C37.5437 18.4203 43.0604 23.937 43.0604 30.7422C43.0604 37.5474 37.5437 43.0641 30.7385 43.0641C28.6802 43.0641 26.6938 42.5581 24.9211 41.6069L20.0942 43.0564C19.3857 43.2691 18.6389 42.8672 18.4262 42.1588C18.3507 41.9074 18.3508 41.6394 18.4263 41.3881L19.8761 36.5639C18.9235 34.7901 18.4167 32.8022 18.4167 30.7422C18.4167 23.937 23.9333 18.4203 30.7385 18.4203ZM30.7385 20.0275C24.821 20.0275 20.0239 24.8247 20.0239 30.7422C20.0239 32.639 20.5167 34.4622 21.4402 36.0701L21.6125 36.3702L20.1088 41.3739L25.1146 39.8708L25.4145 40.0428C27.0215 40.9649 28.8432 41.4569 30.7385 41.4569C36.6561 41.4569 41.4532 36.6598 41.4532 30.7422C41.4532 24.8247 36.6561 20.0275 30.7385 20.0275ZM26.7205 32.3494H31.5403C31.9841 32.3494 32.3439 32.7092 32.3439 33.153C32.3439 33.5598 32.0415 33.8961 31.6493 33.9493L31.5403 33.9566H26.7205C26.2767 33.9566 25.9169 33.5968 25.9169 33.153C25.9169 32.7462 26.2192 32.41 26.6115 32.3568L26.7205 32.3494H31.5403H26.7205ZM26.7205 27.5278H34.7613C35.2051 27.5278 35.5649 27.8876 35.5649 28.3314C35.5649 28.7382 35.2626 29.0745 34.8704 29.1277L34.7613 29.135H26.7205C26.2767 29.135 25.9169 28.7752 25.9169 28.3314C25.9169 27.9246 26.2192 27.5884 26.6115 27.5352L26.7205 27.5278H34.7613H26.7205Z"
                fill="white"/>
        </svg>
        <svg class="iconClose" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_589_4427)">
                <path d="M18 6L6 18" stroke="white" stroke-opacity="1" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M6 6L18 18" stroke="white" stroke-opacity="1" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </g>
            <defs>
                <clipPath id="clip0_589_4427">
                    <rect width="24" height="24" fill="white"/>
                </clipPath>
            </defs>
        </svg>
    </btn>
    <div class="fixedLinks">
        @foreach($contact_socials->where('id', '!=', 5) as $contact_social)
            <a href="{{ $contact_social->link }}">
                <img src="{{ asset('storage/' . $contact_social->image) }}" alt="">
            </a>
        @endforeach

    </div>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script src="{{asset('/')}}front/swiper/swiper.js"></script>
<script src="{{asset('/')}}front/js/index.js?v={{time()}}"></script>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const selectedLang = document.querySelector('.current_lang').innerText.trim().toLowerCase();

        $(document).ready(function () {
            // Dil ayarı
            $.datetimepicker.setLocale(selectedLang);

            // Datepicker ayarları
            $('.datepicker').datetimepicker({
                timepicker: false,
                format: 'd.m.Y',
                lang: selectedLang
            });
            $('.datepicker2').datetimepicker({
                format: 'd.m.Y',
                timepicker: false,
                lang: selectedLang,
                minDate: new Date(new Date().setDate(new Date().getDate() + 1)),
                value: new Date(new Date().setDate(new Date().getDate() + 1)),
                maxDate: new Date(new Date().setDate(new Date().getDate() + 30)),
            });




            // Takvim ikonuna veya input alanına tıklandığında datepicker'ı aç
            $('.calendar-icon, .datepicker').on('click', function () {
                $(this).siblings('.datepicker').datetimepicker('show');
            });
        });
    });

    document.getElementById('loginForm')?.addEventListener('submit', function(event) {
        if (!grecaptcha.getResponse()) {
            event.preventDefault();
            document.getElementById('errorMessage').style.display = 'block';
            // alert('Please complete the reCAPTCHA challenge to submit the form.');
        }
    });

</script>


</body>
</html>
