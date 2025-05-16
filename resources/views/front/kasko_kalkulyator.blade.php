@extends('front.layouts.master')

@section('title', $casco_calculator->seo_title)
@section('description', $casco_calculator->seo_description)
@section('keywords', $casco_calculator->seo_keywords)
@section('image', 'https://kasko.az/storage/869aeca8-d5c6-42ff-b754-5987d24d8e28.webp')
@section('content')

    <form id="kaskoForm" action="{{route('forms.submit')}}" method="post" class="kasko-calculator-container p-lr">
        <h1 class="title">{{$casco_calculator->title}}</h1>
        <h2 class="sub-title">{{$casco_calculator->title}}</h2>
        <div class="form">
            @csrf
            <div class="form-line">
                <div class="form-item">
                    <div class="form-item-selects">
                        @php
                            $brands = [
                                "ABM", "Acura", "Alfa Romeo", "Aprilia", "Asia", "Aston Martin", "ATV", "Audi", "Avatr", "Avia",
                                "Baic", "Bajaj", "Bentley", "BMC", "BMW", "BMW Alpina", "Brilliance", "Buick", "BYD", "Cadillac",
                                "Can-Am", "CFMOTO", "Changan", "Chery", "Chevrolet", "Chrysler", "Citroen", "Dacia", "Dadi",
                                "Daewoo", "DAF", "Daihatsu", "Dayun", "Dnepr", "Dodge", "Dongfeng", "Ducati", "FAW", "Ferrari",
                                "Fiat", "Ford", "Foton", "Freightliner", "Gabro", "GAC", "GAZ", "Geely", "GMC", "Gonow", "Great Wall",
                                "GWM", "Haima", "Haojue", "Haval", "HiPhi", "Honda", "HOWO", "Hozon", "Hummer", "Hyundai", "İkarus",
                                "İM", "Infiniti", "Isuzu", "ItalCar", "Iveco", "JAC", "Jaguar", "Jeep", "Jetour", "Jiajue", "Jinan",
                                "Jinbei", "JMC", "Jonway", "Kaiyi", "Kamaz", "Kawasaki", "Khazar", "Kia", "Krone", "Lada (Vaz)",
                                "Lamborghini", "Land Rover", "Leapmotor", "Lexus", "Li", "Lifan", "Lincoln", "Lixiang", "LYNK&CO",
                                "Mack", "Man", "Maple", "Marshell", "Maserati", "Mayback", "MAZ", "Mazda", "Mercedes Benz",
                                "Mercedes Maybach", "Mercury", "MG", "Mini", "Mitsubishi", "Mondial", "MV Agusta", "NAZLIFAN",
                                "Nissan", "Neta", "Oldsmobile", "Opel", "Peugeot", "Piaggio", "Polestar", "Pontiac", "Porsche",
                                "RAF", "Ravon", "Rexton", "Renault", "RSK", "Rolls-Royce", "Rover", "Saab", "Saipa", "Saturn",
                                "Scania", "Scion", "SEAT", "Setra", "Shacman", "Shaolin", "Shineray", "Skyline", "Skywell", "Skoda",
                                "Smart", "Ssang Yong", "Subaru", "Suzuki", "Tata", "Tatra", "Temsa", "Tesla", "Toyota", "Vespa",
                                "VGV", "Volkswagen", "Volvo", "Voyah", "Vyatka", "XCMG", "Xiaomi", "Yamaha", "Yawa", "Yufeng",
                                "ZAZ", "ZEEKR", "ZIL", "Zongshen", "Zontes", "Zoomlion", "ZX Auto"
                            ];
                        @endphp

                        <select name="marka" required>
                            <option value="">{{$words['marka']->translate(app()->getLocale())->title}}</option>
                            @foreach($brands as $brand)
                                <option
                                    value="{{ $brand }}" {{ request()->input('marka') == $brand ? 'selected' : '' }}>
                                    {{ $brand }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <label for="">{{$words['marka']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <input type="text" required name="model"
                           placeholder="{{$words['model']->translate(app()->getLocale())->title}}"
                           value="{{ request()->input('model') }}">
                    <label for="">{{$words['model']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">
                <div class="form-item">
                    <div class="form-item-selects">
                        <select required name="istehsal_ili" required>
                            <option value="">{{$words['make_year']->translate(app()->getLocale())->title}}</option>
                            @php
                                $years = $casco_calculator->years ?? [];
                                rsort($years);
                            @endphp

                            @foreach($years as $year)
                                <option
                                    value="{{ $year }}" {{ request()->input('istehsal_ili') == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach

                        </select>
                    </div>
                    <label for="">{{$words['make_year']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <input type="number" required name="muherrik_hecmi"
                           placeholder="{{$words['engine_size']->translate(app()->getLocale())->title}}"
                           value="{{ request()->input('muherrik_hecmi') }}">
                    <label for="">{{$words['engine_size']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">
                <div class="form-item">
                    <input type="text" required name="dovlet_qeydiyyat_nisani"
                           placeholder="{{$words['plate_no']->translate(app()->getLocale())->title}}"
                           value="{{ request()->input('dovlet_qeydiyyat_nisani') }}">
                    <label for="">{{$words['plate_no']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <input type="number" required name="bazar_deyeri"
                           placeholder="{{$words['market_value']->translate(app()->getLocale())->title}}"
                           value="{{ request()->input('bazar_deyeri') }}">
                    <label for="">{{$words['market_value']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">
                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="azad_olma_meblegi" required>
                            <option value="">{{$words['free_value']->translate(app()->getLocale())->title}}</option>
                            <option value="100" {{ request()->input('azad_olma_meblegi') == '100' ? 'selected' : '' }}>
                                100
                                azn
                            </option>
                            <option value="250" {{ request()->input('azad_olma_meblegi') == '250' ? 'selected' : '' }}>
                                250
                                azn
                            </option>
                            <option value="500" {{ request()->input('azad_olma_meblegi') == '500' ? 'selected' : '' }}>
                                500
                                azn
                            </option>
                            <option value="800" {{ request()->input('azad_olma_meblegi') == '800' ? 'selected' : '' }}>
                                800
                                azn
                            </option>
                            <option
                                value="1000" {{ request()->input('azad_olma_meblegi') == '1000' ? 'selected' : '' }}>
                                1000 azn
                            </option>
                        </select>
                    </div>
                    <label for="">{{$words['free_value']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-radio">
                    <input required type="radio" id="resmi_servis" name="teminat"
                           value="resmi_servis" {{ request()->input('teminat') == 1 ? 'checked' : '' }}>
                    <label
                        for="resmi_servis">{{$words['official_service']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">

                <div class="form-radio">
                    <input required type="radio" id="qeyri_resmi_servis" name="teminat"
                           value="qeyri_resmi_servis" {{ request()->input('teminat') == 0 ? 'checked' : '' }}>
                    <label
                        for="qeyri_resmi_servis">{{$words['informal_service']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <p><i class="bi bi-info-circle-fill"></i>{{$words['formal_text']->translate(app()->getLocale())->title}}</p>
            <div class="form-line">
                <div class="form-item">
                    <input required type="text" name="ad_soyad"
                           placeholder="{{$words['fullname']->translate(app()->getLocale())->title}}"
                           value="{{ request()->input('ad_soyad') }}">
                    <label for="">{{$words['fullname']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <input required type="text" name="fin_code"
                           placeholder="{{$words['fin_code']->translate(app()->getLocale())->title}}"
                           value="{{ request()->input('fin_code') }}">
                    <label for="">{{$words['fin_code']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">
                <div class="form-item">
                    <div class="form-item-selects">
                        <select required name="suruculuk_tecrubesi">
                            <option
                                value="">{{$words['experience_driver']->translate(app()->getLocale())->title}}</option>
                            <option
                                value="1 ildən az" {{ request()->input('suruculuk_tecrubesi') == '1 ildən az' ? 'selected' : '' }}>
                                1 ildən az
                            </option>
                            <option
                                value="1-2 il" {{ request()->input('suruculuk_tecrubesi') == '1-2 il' ? 'selected' : '' }}>
                                1-2 il
                            </option>
                            <option
                                value="2-5 il" {{ request()->input('suruculuk_tecrubesi') == '2-5 il' ? 'selected' : '' }}>
                                2-5 il
                            </option>
                            <option
                                value="5-10 il" {{ request()->input('suruculuk_tecrubesi') == '5-10 il' ? 'selected' : '' }}>
                                5-10 il
                            </option>
                            <option
                                value="10 ildən çox" {{ request()->input('suruculuk_tecrubesi') == '10 ildən çox' ? 'selected' : '' }}>
                                10 ildən çox
                            </option>
                        </select>
                    </div>
                    <label for="">{{$words['experience_driver']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <input class="datepicker" type="text" required name="dogum_tarixi"
                           value="{{ request()->input('dogum_tarixi') }}"
                           placeholder="{{$words['birthday']->translate(app()->getLocale())->title}}">
                    <i class="bi bi-calendar3 calendar-icon"></i>
                    <label for="">{{$words['birthday']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">

                <div class="form-item">
                    <div class="phone-input">
                        <select required name="prefix">
                            @foreach($prefixes as $key => $prefix)
                                @if($key == 0)
                                    <option value="">{{ $prefix->prefix }}</option>
                                    @continue
                                @endif
                                <option value="{{ $prefix->value }}">{{ $prefix->prefix }}</option>
                            @endforeach
                        </select>
                        <input
                            required
                            name="mobile"
                            id="mobile"
                            type="text"
                            placeholder="{{$words['contact_number']->translate(app()->getLocale())->title}}"
                            maxlength="9"
                            pattern="\d{3}-\d{2}-\d{2}"
                            value=""
                            oninput="applyMask(this)"
                        />
                    </div>
                    <label for="">{{$words['contact_number']->translate(app()->getLocale())->title}}</label>
                </div>

                <div class="form-item" id="kaskoResultScroll">
                    <input type="email" name="elektron_poct"
                           placeholder="{{$words['email']->translate(app()->getLocale())->title}}"
                           value="{{ request()->input('elektron_poct') }}">
                    <label for="">{{$words['email']->translate(app()->getLocale())->title}}</label>
                </div>

            </div>
            <button id="on_submit"
                    class="submit_kasko_calculator">{{$words['calculate']->translate(app()->getLocale())->title}}</button>

        </div>
        <div id="kaskoResult">

        </div>

    </form>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function applyMask(input) {
        let value = input.value.replace(/\D/g, '');

        if (value.length > 3 && value.length <= 5) {
            value = value.substring(0, 3) + '-' + value.substring(3);
        } else if (value.length > 5) {
            value = value.substring(0, 3) + '-' + value.substring(3, 5) + '-' + value.substring(5);
        }

        input.value = value.substring(0, 9);
    }

    $(document).on('click', '#on_submit', function (e) {
        e.preventDefault();

        let firstInvalid = null;

        $(".kasko-calculator-container [required]").each(function () {
            if (!$(this).val()) {
                if (!firstInvalid) {
                    firstInvalid = this;
                }
                $(this).addClass('input-error'); // Qırmızı border üçün
            } else {
                $(this).removeClass('input-error'); // Düzdürsə, class silinsin
            }
        });

        if (firstInvalid) {
            $('html, body').animate({
                scrollTop: $(firstInvalid).offset().top - 100
            }, 500);
            return;
        }

        $.ajax({
            url: "{{ route('calculate_kasko') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                bazar_deyeri: $('input[name="bazar_deyeri"]').val(),
                azad_olma_meblegi: $('select[name="azad_olma_meblegi"]').val(),
                teminat: $('input[name="teminat"]:checked').val()
            },
            success: function (response) {
                $('#kaskoResult').html(`<div class="kasko-calculator-result">
                        <h2>{{$words['fee_insurance']->translate(app()->getLocale())->title}}: <span>${response.result}</span> AZN</h2>
                        <p>
                            <i class="bi bi-info-circle-fill"></i>
                            {{$words['success_kasko_calc_message']->translate(app()->getLocale())->title}}
                </p>
                        <div class="robot form-group mb-3 text-center row mt-3 pt-1">
                            <div class="col-12">
                                <div id="g-recaptcha" class="g-recaptcha"></div>
                            </div>
                                @if($errors->first('captcha'))
                                <small class="form-text text-danger" style="color: red">{{$errors->first('captcha')}}</small>
                                 @endif
                                <small class="form-text text-danger" id="errorMessage" style="color: red; display: none">Please complete the reCAPTCHA challenge to submit the form</small>
                            </div>
                            <button form="kaskoForm" type="submit" id="order_kasko" class="order_kasko">{{$words['order_it']->translate(app()->getLocale())->title}}</button>
                        </div>`);

                if (typeof grecaptcha !== 'undefined') {
                    grecaptcha.render('g-recaptcha', {
                        sitekey: '6LdhrpYqAAAAAPlC9H15nBtyyAmpqfxc7aqMvjMg'
                    });
                } else {
                    console.error('reCAPTCHA library not loaded.');
                }

                document.getElementById('kaskoResultScroll').scrollIntoView({behavior: 'smooth'});
            },
            error: function () {
                window.scrollBy({ top: -100, behavior: 'smooth' });
            }
        });
    });

    $(document).on('click', '#order_kasko', function (e) {
        e.preventDefault();

        const recaptchaResponse = grecaptcha.getResponse();

        if (!recaptchaResponse) {
            $('#errorMessage').show().text('Zəhmət olmasa, reCAPTCHA testini tamamlayın.');
            return;
        }

        $('#errorMessage').hide(); // Clear previous error message

        // Validate required fields
        e.preventDefault();

        let firstInvalid = null;

        $(".kasko-calculator-container [required]").each(function () {
            if (!$(this).val()) {
                if (!firstInvalid) {
                    firstInvalid = this;
                }
                $(this).addClass('is-invalid'); // Qırmızı border üçün
            } else {
                $(this).removeClass('is-invalid'); // Düzdürsə, class silinsin
            }
        });

        if (firstInvalid) {
            $('html, body').animate({
                scrollTop: $(firstInvalid).offset().top - 100
            }, 500);
            return;
        }

        const formData = new FormData($('#kaskoForm')[0]);
        formData.append('g-recaptcha-response', recaptchaResponse);

        $.ajax({
            url: "{{ route('calc_form_submit') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    window.location.href = response.redirect_url;
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr) {
                window.scrollBy({ top: -100, behavior: 'smooth' });
            }
        });
    });



    document.addEventListener('DOMContentLoaded', function () {
        const istehsalIliSelect = document.querySelector('select[name="istehsal_ili"]');
        const resmiServisRadio = document.getElementById('resmi_servis');
        const qeyriResmiServisRadio = document.getElementById('qeyri_resmi_servis');

        function checkIstehsalIli() {
            const selectedIstehsalIli = parseInt(istehsalIliSelect.value);
            if (selectedIstehsalIli < 2019) {
                resmiServisRadio.disabled = true;
                resmiServisRadio.checked = false; // Uncheck if selected
                qeyriResmiServisRadio.checked = true; // Select non-official service
            } else {
                resmiServisRadio.disabled = false;
            }
        }

        istehsalIliSelect.addEventListener('change', checkIstehsalIli);

        // Check on page load if a year is already selected
        checkIstehsalIli();
    });


</script>
