<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{ asset('') }}cabinet/css/global.css"/>
    <link rel="stylesheet" href="{{ asset('') }}cabinet/css/style.css"/>
    <link rel="stylesheet" href="{{ asset('') }}cabinet/css/responsive.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css"/>
    <link rel="icon" type="image/x-icon" href="{{asset('storage/' . $favicon->image)}}">
    <title>Kasko | Daxil ol</title>
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
        <img src="{{ asset('') }}cabinet/images/registerimg.svg" alt=""/>
    </div>
    <div class="right-area">
        <div class="custom-lang-area">
            <div class="custom-language" id="custom_language">
                <img src="{{ asset('') }}cabinet/images/mp.svg" alt="globus" class="lang_icon"/>
                <p class="default-lang">Azərbaycan dili</p>
                <img src="{{ asset('') }}cabinet/images/down.svg" alt="down-up" class="down_icon"/>
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
                            <a href="{{ route('dashboard.login') }}" class="link active-link">Daxil ol</a>
                            <a href="{{ route('dashboard.register') }}" class="link">Qeydiyyat</a>
                        </nav>
                    </div>
                    <form accept-charset="UTF-8" class="input-field-area-sign" method="POST" action="{{ route('dashboard.login.submit') }}">
                        @csrf
                        <div class="input-field-form">
                            <label for="email">Email, FIN kod  və ya Telefon nömrəsi</label>
                            <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Email və ya FIN kod" required/>
                            @error('email') <span class="text-danger1">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field-pass">
                            <label for="password">Şifrə</label>
                            <div class="fielding">
                                <input type="password" id="password" name="password" placeholder="Şifrə" required/>
                                <img src="{{ asset('') }}cabinet/images/EyeClosed.svg" alt="" class="eye"/>
                            </div>
                            @error('password') <span class="text-danger1">{{ $message }}</span> @enderror
                        </div>

                        <div class="checkbox-section-login">
                            <a href="/forgot_password.html">Şifrəmi unutdum</a>
                        </div>
                        <button type="submit">Daxil ol</button>
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
            {regex: /[\W_]/, element: document.querySelectorAll('.changed-text')[4]}, // Özel sembol
        ];
        const ruleIcons = document.querySelectorAll('.changed-icon');

        eyeIcons.forEach((eyeIcon, index) => {
            eyeIcon.addEventListener('click', function () {
                if (passwordInputs[index].type === 'password') {
                    passwordInputs[index].type = 'text';
                    eyeIcon.src = '{{ asset('') }}cabinet/images/Eye.svg';
                } else {
                    passwordInputs[index].type = 'password';
                    eyeIcon.src = '{{ asset('') }}cabinet/images/EyeClosed.svg';
                }
            });
        });

        passwordInputs[0].addEventListener('input', function () {
            const password = this.value;

            passwordRules.forEach((rule, index) => {
                if (rule.regex.test(password)) {
                    rule.element.classList.add('changed-text-green');
                    ruleIcons[index].src = '{{ asset('') }}cabinet/images/Unreadgreen.svg';
                } else {
                    rule.element.classList.remove('changed-text-green');
                    ruleIcons[index].src = '{{ asset('') }}cabinet/images/ddd.svg';
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
