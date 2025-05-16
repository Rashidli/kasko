@extends('cabinet.layouts.master')

@section('title', 'Şəxsi kabinet')

@section('content')
    <div class="container-content">
        <h1 class="insurance_products_title">Sığorta məhsullarım</h1>
        <article class="grid-card-item">
            <div class="card-item">
                <div class="top-content">
                    <div class="icon-wrapper">
                        <img src="{{ asset('/') }}cabinet/images/cardicon1.svg" alt=""/>
                    </div>
                    <p class="text-field-icon">Səyahət sığortası</p>
                </div>
                <a href="/travel_insurance.html" class="button-component">
                    <p>Əldə et</p>
                    <img src="{{ asset('/') }}cabinet/images/righting.svg" alt=""/>
                </a>
            </div>
            <div class="card-item">
                <div class="top-content">
                    <div class="icon-wrapper">
                        <img src="{{ asset('/') }}cabinet/images/cardicon2.svg" alt=""/>
                    </div>
                    <p class="text-field-icon">Avtomobil sığortası</p>
                </div>
                <a href="/kasko_insurance.html" class="button-component">
                    <p>Əldə et</p>
                    <img src="{{ asset('/') }}cabinet/images/righting.svg" alt=""/>
                </a>
            </div>
            <div class="card-item">
                <div class="top-content">
                    <div class="icon-wrapper">
                        <img src="{{ asset('/') }}cabinet/images/cardicon3.svg" alt=""/>
                    </div>
                    <p class="text-field-icon">Daşınmaz əmlak sığortası</p>
                </div>
                <a href="{{route('property.insurance')}}" class="button-component">
                    <p>Əldə et</p>
                    <img src="{{ asset('/') }}cabinet/images/righting.svg" alt=""/>
                </a>
            </div>
            <div class="card-item">
                <div class="top-content">
                    <div class="icon-wrapper">
                        <img src="{{ asset('/') }}cabinet/images/cardicon4.svg" alt=""/>
                    </div>
                    <p class="text-field-icon">Tibbi sığorta</p>
                </div>
                <a href="/medical_insurance.html" class="button-component">
                    <p>Əldə et</p>
                    <img src="{{ asset('/') }}cabinet/images/righting.svg" alt=""/>
                </a>
            </div>
        </article>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const settings_button = document.getElementById('settings_button');
            const settings_menu = document.querySelector('.settings-menu');
            const text_field = document.getElementById('text_field');
            const bodyOverlay = document.getElementById('overlay-body');

            function showMenu() {
                settings_menu.classList.add('active-settings');
                text_field.classList.add('text_field_toggle');
                bodyOverlay.classList.add('actived');
                settings_button.classList.add('actived-settingsbtn');
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
    </script>
@endpush
