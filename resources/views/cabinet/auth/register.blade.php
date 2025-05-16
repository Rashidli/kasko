<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{ asset('/') }}cabinet/css/global.css"/>
    <link rel="stylesheet" href="{{ asset('/') }}cabinet/css/style.css"/>
    <link rel="stylesheet" href="{{ asset('/') }}cabinet/css/responsive.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Kasko | Qeydiyyat</title>
    <style>
        .text-danger1 {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>
<body>
<div class="register">
    <div class="background">
        <img src="{{ asset('/') }}cabinet/images/registerimg.svg" alt=""/>
    </div>
    <div class="right-area">
        <div class="custom-lang-area">
            <div class="custom-language" id="custom_language">
                <img src="{{ asset('/') }}cabinet/images/mp.svg" alt="globus" class="lang_icon"/>
                <p class="default-lang">Azərbaycan dili</p>
                <img src="{{ asset('/') }}cabinet/images/down.svg" alt="down-up" class="down_icon"/>
            </div>
            <div class="custom-language-dropdown">
                <!-- if when change language, set it language this active-lang class -->
                <a href="" class="link-lang active-lang">Azərbaycan dili</a>
                <a href="" class="link-lang">İngilis dili</a>
                <a href="" class="link-lang">Rus dili</a>
            </div>
        </div>
        <div class="right-form">
            <div class="register-form">
                <div class="top-title-area">
                    <h1>Xoş gəldiniz!</h1>
                    <p>Xoş gəldiniz! Hesabınıza daxil olun və ya qeydiyyatdan keçin.</p>
                </div>
                <div class="content-area">
                    <div class="top-nav">
                        <nav class="nav-content">
                            <a href="{{ route('dashboard.login') }}" class="link">Daxil ol</a>
                            <a href="{{ route('dashboard.register') }}" class="link active-link">Qeydiyyat</a>
                        </nav>
                    </div>


                    <form accept-charset="UTF-8" class="input-field-area-sign" method="POST" action="{{ route('dashboard.register') }}">
                        @csrf

{{--                        <div class="input-field-form">--}}
{{--                            <label for="name">Ad</label>--}}
{{--                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Email"/>--}}
{{--                            @error('name') <span class="text-danger1">{{ $message }}</span> @enderror--}}

{{--                        </div>--}}

{{--                        <div class="input-field-form">--}}
{{--                            <label for="surname">Soyad</label>--}}
{{--                            <input type="text" id="surname" name="surname" value="{{ old('surname') }}" placeholder="Email"/>--}}
{{--                            @error('surname') <span class="text-danger1">{{ $message }}</span> @enderror--}}

{{--                        </div>--}}

                        <div class="input-field-form">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email"/>
                            @error('email') <span class="text-danger1">{{ $message }}</span> @enderror

                        </div>

                        <div class="input-field-form">
                            <label for="fin_code">FİN kod</label>
                            <input type="text" id="fin_code" name="fin_code" value="{{ old('fin_code') }}" placeholder="FİN kod"/>
                            @error('fin_code') <span class="text-danger1">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field-mobile">
                            <label for="phone">Mobil nömrə</label>
                            <div class="input-mobile">
                                <select name="prefix" >
                                    @foreach($prefixes as $prefix)
                                        <option value="{{$prefix->value}}">{{$prefix->prefix}}</option>
                                    @endforeach
                                </select>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="555 55 55"/>
                            </div>
                            @error('prefix') <span class="text-danger1">{{ $message }}</span> @enderror
                            @error('phone') <span class="text-danger1">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field-pass">
                            <label for="password">Şifrə</label>
                            <div class="fielding">
                                <input type="password" id="password" name="password" placeholder="Şifrə"/>
                                <img src="{{ asset('cabinet/images/EyeClosed.svg') }}" alt="" class="eye"/>
                            </div>
                            @error('password') <span class="text-danger1">{{ $message }}</span> @enderror
                        </div>

                        <div class="left-pass-checker-sign">
                            <span>Şifrədə olmalıdır:</span>
                            <div class="checkers">
                                <div class="field">
                                    <img class="changed-icon" src="{{asset('/')}}cabinet/images/ddd.svg" alt="" />
                                    <p class="changed-text">1 böyük hərf</p>
                                </div>
                                <div class="field">
                                    <img class="changed-icon" src="{{asset('/')}}cabinet/images/ddd.svg" alt="" />
                                    <p class="changed-text">1 kiçik hərf</p>
                                </div>
                                <div class="field">
                                    <img class="changed-icon" src="{{asset('/')}}cabinet/images/ddd.svg" alt="" />
                                    <p class="changed-text">Ən azı 8 simvol</p>
                                </div>
                                <div class="field">
                                    <img class="changed-icon" src="{{asset('/')}}cabinet/images/ddd.svg" alt="" />
                                    <p class="changed-text">1 rəqəm</p>
                                </div>
                                <div class="field">
                                    <img class="changed-icon" src="{{asset('/')}}cabinet/images/ddd.svg" alt="" />
                                    <p class="changed-text">1 xüsusi simvol</p>
                                </div>
                            </div>
                        </div>

                        <div class="checkbox-section">
                            <input type="checkbox" name="privacy_policy" value="1">
                            <p class="text">Mən <a href="">Qaydalar</a> və <a href="">Şərtləri</a> oxudum və razıyam.</p>
                        </div>
                        @error('privacy_policy') <span class="text-danger1">{{ $message }}</span> @enderror

                        <button type="submit">Qeydiyyatdan keç</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<script>
    $(document).ready(function () {
        $('select').niceSelect();
    });

    document.addEventListener('DOMContentLoaded', function () {
        const passwordInputs = document.querySelectorAll('.input-field-pass input');
        const eyeIcons = document.querySelectorAll('.eye');
        const passwordRules = [
            {regex: /[A-Z]/, element: document.querySelectorAll('.changed-text')[0]}, // Büyük harf
            {regex: /[a-z]/, element: document.querySelectorAll('.changed-text')[1]}, // Küçük harf
            {regex: /.{8,}/, element: document.querySelectorAll('.changed-text')[2]}, // 8 karakter
            {regex: /\d/, element: document.querySelectorAll('.changed-text')[3]}, // Rakam
            {regex: /[@$!%*?&#]/, element: document.querySelectorAll('.changed-text')[4]}, // Özel sembol
        ];
        const ruleIcons = document.querySelectorAll('.changed-icon');

        eyeIcons.forEach((eyeIcon, index) => {
            eyeIcon.addEventListener('click', function () {
                if (passwordInputs[index].type === 'password') {
                    passwordInputs[index].type = 'text';
                    eyeIcon.src = '{{ asset('/') }}cabinet/images/Eye.svg';
                } else {
                    passwordInputs[index].type = 'password';
                    eyeIcon.src = '{{ asset('/') }}cabinet/images/EyeClosed.svg';
                }
            });
        });

        passwordInputs[0].addEventListener('input', function () {
            const password = this.value;

            passwordRules.forEach((rule, index) => {
                if (rule.regex.test(password)) {
                    rule.element.classList.add('changed-text-green');
                    ruleIcons[index].src = '{{ asset('/') }}cabinet/images/Unreadgreen.svg';
                } else {
                    rule.element.classList.remove('changed-text-green');
                    ruleIcons[index].src = '{{ asset('/') }}cabinet/images/ddd.svg';
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const custom_language_btn = document.getElementById('custom_language');
        const custom_language_dropdown = document.querySelector('.custom-language-dropdown');
        const lang_icon = document.querySelector('.down_icon');

        custom_language_btn.addEventListener('click', function (event) {
            event.stopPropagation();
            custom_language_dropdown.classList.toggle('active-dropdown');

            if (custom_language_dropdown.classList.contains('active-dropdown')) {
                lang_icon.style.transform = 'rotate(180deg)';
            } else {
                lang_icon.style.transform = 'rotate(0deg)';
            }
        });

        document.addEventListener('click', function () {
            if (custom_language_dropdown.classList.contains('active-dropdown')) {
                custom_language_dropdown.classList.remove('active-dropdown');
                lang_icon.style.transform = 'rotate(0deg)';
            }
        });

        custom_language_dropdown.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    });
</script>
</body>
</html>
