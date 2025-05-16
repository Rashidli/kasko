<header class="header-wrapper">
    <div class="header">
        <section class="left-section">
            <a href="" class="profile-icon">
                <img src="{{asset('/')}}cabinet/images/User.svg" alt="user" title="Lorem" />
            </a>
            <article class="text-content">
                <h2>Salam, {{auth()->guard('customer')->user()->name}} {{auth()->guard('customer')->user()->surname}}</h2>
                <p>Sizi yenidən görmək xoşdur.</p>
            </article>
        </section>
        <section class="right-section">
            <a href="/notifications.html" class="icon-container">
                <div class="icon">
                    <img src="{{asset('/')}}cabinet/images/Bell.svg" alt="" />
                    <!-- if have a notification show this element -->
                    <div class="have-notification">
                        <p>3</p>
                    </div>
                </div>
                <p class="text-field">Bildirişlər</p>
            </a>
            <a id="settings_button" href="/settings_my_informations.html" class="icon-container">
                <div class="icon">
                    <img src="{{asset('/')}}cabinet/images/Settings.svg" alt="" />
                </div>
                <p id="text_field" class="text-field">Tənzimləmələr</p>
            </a>
            <!-- SETTINGS MENU -->
            <div class="settings-menu">
                <div class="title-content-settings">
                    <h2>Tənzimləmələr</h2>
                </div>
                <nav class="navigators">
                    <a class="link-setting" href="/settings_my_informations.html">
                        <img src="{{asset('/')}}cabinet/images/usered.svg" alt="" />
                        <p>Məlumatlarım</p>
                    </a>
                    <a class="link-setting" href="/settings_change_pass.html">
                        <img src="{{asset('/')}}cabinet/images/usered2.svg" alt="" />
                        <p>Şifrəni dəyiş</p>
                    </a>
                    <a class="link-setting" href="/settings_lang_select.html">
                        <img src="{{asset('/')}}cabinet/images/usered3.svg" alt="" />
                        <p>Dil seçimi</p>
                    </a>
                    <a class="link-setting" href="/settings_contact_us_teklif.html">
                        <img src="{{asset('/')}}cabinet/images/usered4.svg" alt="" />
                        <p>Bizimlə əlaqə</p>
                    </a>
                    <a class="link-setting" href="{{route('dashboard.logout')}}">
                        <img src="{{asset('/')}}cabinet/images/Logout 2.svg" alt="" />
                        <p>Çıxış</p>
                    </a>
                </nav>
            </div>
            <!-- OVERLAY BODY -->
            <div id="overlay-body"></div>
        </section>
        <!-- mobile -->
        <div style="display: none" class="sidebar-mobile">
            <button type="button" class="toggle-button" id="open_toggle_btn">
                <img src="{{asset('/')}}cabinet/images/hamburger.svg" alt="" />
            </button>
        </div>
        <div class="overlay" id="toggle_menu_overlay" style="display: none">
            <div class="toggle-menu" id="toggle_menu" style="display: none">
                <div class="head-menu">
                    <div class="left">
                        <div class="profile">
                            <img src="{{asset('/')}}cabinet/images/User.svg" alt="" />
                        </div>
                        <div class="text">
                            <h2>Salam, {{auth()->guard('customer')->user()->name}} {{auth()->guard('customer')->user()->surname}}</h2>
                            <p>Sizi yenidən görmək xoşdur.</p>
                        </div>
                    </div>

                    <button type="button" class="toggle-button" id="close_toggle_btn">
                        <img src="{{asset('/')}}cabinet/images/cls.svg" alt="" />
                    </button>
                </div>
                <div class="menu">
                    <p class="mini-title">Menu</p>
                    <nav class="navbar">
                        <a href="/insurance_products.html" class="active-link">
                            <img src="{{asset('/')}}cabinet/images/Shield Check.svg" alt="" />
                            <p>Sığorta məhsulları</p>
                        </a>
                        <a href="/my_contracts.html">
                            <img src="{{asset('/')}}cabinet/images/Document Add.svg" alt="" />
                            <p>Müqavilələrim</p>
                        </a>
                        <a href="/bonus_companies.html">
                            <img src="{{asset('/')}}cabinet/images/Medal Ribbons Star.svg" alt="" />
                            <p>Bonus kompaniyalar</p>
                        </a>
                        <a href="/notifications.html">
                            <img src="{{asset('/')}}cabinet/images/Bell.svg" alt="" />
                            <p>Bildirişlər</p>
                        </a>
                        <a href="">
                            <img src="{{asset('/')}}cabinet/images/Settings.svg" alt="" />
                            <p>Tənzimləmələr</p>
                        </a>
                        <a href="">
                            <img src="{{asset('/')}}cabinet/images/redlogout.svg" alt="" />
                            <p>Çıxış</p>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <a href="/insurance_products.html" class="mobile-logo" style="display: none">
            <img src="{{asset('/')}}cabinet/images/image 1.svg" alt="" />
        </a>
        <!-- mobile -->
    </div>
</header>
