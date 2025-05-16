@extends('cabinet.layouts.master')

@section('title', 'İcbari əmlak siğortası.')

@section('content')

    <div class="container-content">
        <article class="title-head-add-contract">
            <a href="/insurance_products.html" class="icon-to-back">
                <img src="{{asset('/')}}cabinet/images/Reply.svg" alt=""/>
                <p>Geri</p>
            </a>
            <h1>Daşınmaz əmlak sığortası</h1>
        </article>

        <article class="grid-card-item-insurance">
            <a href="/property_insurance.html" class="item-insurance active-insurance">
                <div class="icon">
                    <img src="{{asset('/')}}cabinet/images/Homeactive.svg" alt=""/>
                </div>
                <h2>İcbari əmlak sığortası</h2>
            </a>
            <a href="/voluntary_insurance.html" class="item-insurance">
                <div class="icon">
                    <img src="{{asset('/')}}cabinet/images/Home.svg" alt=""/>
                </div>
                <h2>Könüllü əmlak sığortası</h2>
            </a>
            <a href="/labor_insurance.html" class="item-insurance">
                <div class="icon">
                    <img src="{{asset('/')}}cabinet/images/Home.svg" alt=""/>
                </div>
                <h2>Əmlak sığortası paketləri</h2>
            </a>
        </article>

        <form class="kasko-insurance-form"  method="post" accept-charset="UTF-8" id="compulsoryPropertyForm">
            @csrf
            <div class="title-form">
                <h3>İcbari əmlak sığorta müraciət formu</h3>
            </div>
            <div class="form-content">
                <div class="field-content">

                    <!-- Başlama tarixi -->
                    <div class="item-field">
                        <label for="effective_from_date">Başlama tarixi</label>
                        <input type="text" id="effective_from_date" name="effective_from_date" required />
                    </div>
                    <!-- Şəxsiyyət vəsiqəsinin FİN-i -->
                    <div class="item-field">
                        <label for="id_card_pin">Şəxsiyyət vəsiqəsinin FİN-i</label>
                        <input type="text" id="id_card_pin" name="id_card_pin" minlength="7" maxlength="7" oninput="this.value = this.value.toUpperCase()" placeholder="Şəxsiyyət vəsiqəsinin FİN-i (ABC1234)" required />
                    </div>

                    <!-- Şəxsiyyət vəsiqəsinin seriya və nömrəsi -->
                    <div class="item-field">
                        <label for="id_series_and_number">Seriya və nömrə</label>
                        <input type="text" id="id_series_and_number" oninput="this.value = this.value.toUpperCase()" name="id_series_and_number" placeholder="Seriya və nömrə (AA1234567 / AZE12345678)" required />
                    </div>
                    <!-- Şəxsin növü -->
                    <div class="item-field">
                        <label for="person_type">Şəxsin növü</label>
                        <input type="text" id="person_type" name="person_type" value="Fiziki şəxs" readonly />
                    </div>
                    <!-- Daşınmaz əmlak növü (Əmlakın istifadə növü) -->
                    <div class="item-field">
                        <label for="property_usage_type">Əmlakın istifadə növü</label>
                        <select id="property_usage_type" name="property_usage_type" required>
                            <option value="">Əmlakın istifadə növü</option>
                            <option value="6">Mənzil</option>
                            <option value="3">Bağ evi</option>
                            <option value="13">Yaşayış binası</option>
                        </select>
                    </div>

                    <div class="item-field">
                        <label for="registration_number">Əmlakın qeydiyyat nömrəsi</label>
                        <input type="text" id="registration_number" name="registration_number" placeholder="0000000000" required />
                    </div>

                    <div class="item-field">
                        <label for="registry_number">Əmlakın reyestr nömrəsi</label>
                        <input type="text" id="registry_number" name="registry_number" placeholder="00000000000000-00000-0000" required />
                    </div>

                    <div class="item-field">
                        <label for="phone_number">Mobil nömrə</label>
                        <input type="text" id="phone_number" name="phone_number" placeholder="Mobil nömrə (+994501234567)" required />
                    </div>

                    <div class="item-field">
                        <label for="email">E-poçt</label>
                        <input type="email" id="email" name="email" placeholder="E-poçt (vacib deyil)" />
                    </div>

                </div>
            </div>
            <div class="button-section">
                <button type="submit">
                    <p>Sifariş et</p>
                    <img src="{{asset('/')}}cabinet/images/right.svg" alt="" />
                </button>
            </div>
        </form>

    </div>
    <div id="iframePopup" style="display: none; position: fixed; top: 40px; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 9999;">
        <div style="position: relative; width: 95%; height: 90%; margin: auto; background: #fff; border-radius: 8px; overflow: hidden;">
            <button onclick="closeIframePopup()" style="position: absolute; top: 10px; right: 10px; z-index: 10; background: red; color: #fff; border: none; padding: 5px 10px; cursor: pointer;">Bağla</button>
            <iframe id="iframeContent" src="" style="width: 100%; height: 100%; border: none;"></iframe>
        </div>
    </div>

@endsection

@push('scripts')
    <script>

        document.getElementById('compulsoryPropertyForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
            const payload = {
                effectiveFromDate: formData.get("effective_from_date"),
                registrationNumber: formData.get("registration_number"),
                registryNumber: formData.get("registry_number"),
                propertyUsageType: formData.get("property_usage_type"),
                idDocument: formData.get("id_series_and_number"),
                insuredIdNumber: formData.get("id_card_pin"),
                // insuredPhoneNumber: "+994" + formData.get("phone_number"),
                insuredPhoneNumber: formData.get("phone_number"),
                insuredEmail: formData.get("email") || null,
                juridicalType: "0",
                entityType: "physical",
            };

            const response = await fetch("{{ route('get_iframe_url') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (result?.iframe_url) {
                window.location.href = result.iframe_url;
            } else {
                alert("Xəta baş verdi. Yenidən yoxlayın.");
            }
        });


        document.addEventListener('DOMContentLoaded', function () {
            const settings_button = document.getElementById('settings_button');
            const settings_menu = document.querySelector('.settings-menu');
            const text_field = document.getElementById('text_field');
            const bodyOverlay = document.getElementById('overlay-body');

            function showMenu() {
                settings_menu.classList.add('active-settings');
                text_field.classList.add('text_field_toggle');
                bodyOverlay.classList.add('actived');
                settings_button.classList.add('actived-settingsbtn')
            }

            function hideMenu(event) {
                if (!settings_button.contains(event.relatedTarget) && !settings_menu.contains(event.relatedTarget)) {
                    settings_menu.classList.remove('active-settings');
                    text_field.classList.remove('text_field_toggle');
                    bodyOverlay.classList.remove('actived');
                    settings_button.classList.remove('actived-settingsbtn');
                }
            }

            settings_button.addEventListener('mouseenter', showMenu);
            settings_button.addEventListener('mouseleave', hideMenu);
            settings_menu.addEventListener('mouseleave', hideMenu);
        });

        document.addEventListener('DOMContentLoaded', function () {
            const close_toggle_btn = document.getElementById('close_toggle_btn');
            const open_toggle_btn = document.getElementById('open_toggle_btn');
            const toggle_menu = document.getElementById('toggle_menu');
            const toggle_menu_overlay = document.getElementById('toggle_menu_overlay');

            open_toggle_btn.addEventListener('click', function () {
                toggle_menu.classList.add('active');
                toggle_menu_overlay.classList.add('active');
            });

            close_toggle_btn.addEventListener('click', function () {
                toggle_menu.classList.remove('active');
                toggle_menu_overlay.classList.remove('active');
            });
        });

        const today = new Date();
        const tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);

        // 30 gün sonrakı tarixi hesablayırıq
        const maxDate = new Date();
        maxDate.setDate(today.getDate() + 30);

        flatpickr("#effective_from_date", {
            defaultDate: tomorrow,
            minDate: tomorrow,
            maxDate: maxDate,  // Maksimum 30 gün sonraya qədər icazə veririk
            dateFormat: "d.m.Y",
            disableMobile: true,
            // Ayları dəyişməni qadağan edirik
            onReady: function(selectedDates, dateStr, instance) {
                instance._prevMonthNav.removeEventListener("click", instance._handlers["prevMonthNav"]);
                instance._nextMonthNav.removeEventListener("click", instance._handlers["nextMonthNav"]);
                instance._prevMonthNav.style.visibility = "hidden";
                instance._nextMonthNav.style.visibility = "hidden";
            }
        });

    </script>
@endpush
