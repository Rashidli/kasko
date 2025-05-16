<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Kasko</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    {{--    <link href="{{asset('assets/css/select2.css')}}" rel="stylesheet"/>--}}

    <!-- jquery.vectormap css -->
    <link href="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
          type="text/css"/>

    <!-- Bootstrap Css -->
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" id="app-style" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    @livewireStyles
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body data-topbar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    {{--                    <a href="{{route('home')}}" class="logo logo-dark">--}}
                    {{--                                <span class="logo-sm">--}}
                    {{--                                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="logo-sm" height="22">--}}
                    {{--                                </span>--}}
                    {{--                        <span class="logo-lg">--}}
                    {{--                                    <img src="{{asset('assets/images/logo-dark.png')}}" alt="logo-dark" height="20">--}}
                    {{--                                </span>--}}
                    {{--                    </a>--}}

                    {{--                    <a href="{{route('home')}}" class="logo logo-light">--}}
                    {{--                                <span class="logo-sm">--}}
                    {{--                                    <img src="{{asset('assets/images/logo-sm.png')}}" alt="logo-sm-light" height="22">--}}
                    {{--                                </span>--}}
                    {{--                        <span class="logo-lg">--}}
                    {{--                                    <img src="{{asset('assets/images/logo-light.png')}}" alt="logo-light" height="20">--}}
                    {{--                                </span>--}}
                    {{--                    </a>--}}
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>

                <!-- App Search-->
                {{--                <form class="app-search d-none d-lg-block">--}}
                {{--                    <div class="position-relative">--}}
                {{--                        <input type="text" class="form-control" placeholder="Search...">--}}
                {{--                        <span class="ri-search-line"></span>--}}
                {{--                    </div>--}}
                {{--                </form>--}}
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-search-line"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="mb-3 m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="ri-fullscreen-line"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span
                            class="d-none d-xl-inline-block ms-1">{{Auth::user()->name}} {{Auth::user()->surname}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="javascript: void(0)"><i
                                class="ri-user-line align-middle me-1"></i> Profile</a>
                        <a class="dropdown-item d-block" href="javascript: void(0)"><span
                                class="badge bg-success float-end mt-1">11</span><i
                                class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{route('logout')}}"><i
                                class="ri-shut-down-line align-middle me-1 text-danger"></i> Çıxış</a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <!-- Admin Panel -->
                    <li>
                        <a href="{{ route('home') }}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Admin Panel</span>
                        </a>
                    </li>

                    <!-- Users Management -->

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-user-line"></i>
                            <span>İstifadəçilər</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            @can('create-users')
                                <li><a href="{{ route('users.create') }}">İstifadəçi yarat</a></li>
                            @endcan
                            @can('list-users')
                                <li><a href="{{ route('users.index') }}">İstifadəçilər</a></li>
                            @endcan
                            @can('list-roles')
                                <li><a href="{{ route('roles.index') }}">Roles</a></li>
                            @endcan
                            @can('list-permissions')
                                <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                            @endcan
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('customers.index') }}">
                            <i class="ri-image-line"></i>
                            <span>Userlər</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('property.insurances') }}">
                            <i class="ri-image-line"></i>
                            <span>DƏİS</span>
                        </a>
                    </li>

                    <!-- Hero Section -->
                    @can('list-sliders')
                        <li>
                            <a href="{{ route('mains.index') }}">
                                <i class="ri-image-line"></i>
                                <span>Hero</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Categories -->
                    @can('list-categories')
                        <li>
                            <a href="{{ route('categories.index') }}">
                                <i class="ri-list-unordered"></i>
                                <span>Kateqoriyalar</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Forms -->
                    @can('list-forms')
                        <li>
                            <a href="{{ route('forms.index') }}">
                                <i class="ri-file-text-line"></i>
                                <span>Formlar</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Services -->
                    @can('list-services')
                        <li>
                            <a href="{{ route('services.index') }}">
                                <i class="ri-service-line"></i>
                                <span>Xidmətlər</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Messages -->
                    @can('list-form_submissions')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-mail-line"></i>
                                <span>Sifarişlər</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('form_submissions.index', ['category_id' => $category->id]) }}">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endcan

                    <!-- About Us -->
                    @can('list-abouts')
                        <li>
                            <a href="{{ route('abouts.index') }}">
                                <i class="ri-information-line"></i>
                                <span>Haqqımızda</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Partners -->
                    @can('list-partners')
                        <li>
                            <a href="{{ route('partners.index') }}">
                                <i class="ri-user-add-line"></i>
                                <span>Partnyorlar</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Advantages -->
                    @can('list-advantages')
                        <li>
                            <a href="{{ route('advantages.index') }}">
                                <i class="ri-trophy-line"></i>
                                <span>Üstünlüklərimiz</span>
                            </a>
                        </li>
                    @endcan

                    <!-- News -->
                    @can('list-blogs')
                        <li>
                            <a href="{{ route('blogs.index') }}">
                                <i class="ri-newspaper-line"></i>
                                <span>Xəbərlər</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Useful Information -->
                    @can('list-contents')
                        <li>
                            <a href="{{ route('contents.index') }}">
                                <i class="ri-file-list-line"></i>
                                <span>Faydalı bilgilər</span>
                            </a>
                        </li>
                    @endcan

                    <!-- FAQs -->
                    @can('list-faqs')
                        <li>
                            <a href="{{ route('faqs.index') }}">
                                <i class="ri-question-line"></i>
                                <span>Tez tez verilən suallar</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Socials -->
                    @can('list-socials')
                        <li>
                            <a href="{{ route('socials.index') }}">
                                <i class="ri-facebook-line"></i> <!-- Example for social media -->
                                <span>Sosial şəbəkələr</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Contact Information -->
                    @can('list-contact_lists')
                        <li>
                            <a href="{{ route('contact_items.index') }}">
                                <i class="ri-phone-line"></i>
                                <span>Əlaqə məlumatları</span>
                            </a>
                        </li>
                    @endcan

                    <!-- SEO -->
                    @can('list-singles')
                        <li>
                            <a href="{{ route('singles.index') }}">
                                <i class="ri-search-line"></i>
                                <span>SEO</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Translations -->
                    @can('list-translates')
                        <li>
                            <a href="{{ route('words.index') }}">
                                <i class="ri-global-line"></i>
                                <span>Tərcümələr</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Logo -->
                    @can('list-images')
                        <li>
                            <a href="{{ route('images.index') }}">
                                <i class="ri-image-line"></i>
                                <span>Logo / favicon</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Statistics -->
                    @can('list-statistics')
                        <li>
                            <a href="{{ route('statistics.index') }}">
                                <i class="ri-bar-chart-line"></i>
                                <span>Statistika</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Useful Links -->
                    @can('list-links')
                        <li>
                            <a href="{{ route('links.index') }}">
                                <i class="ri-link-m"></i>
                                <span>Faydalı linklər</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Google Tags -->
                    @can('list-tags')
                        <li>
                            <a href="{{ route('tags.index') }}">
                                <i class="ri-price-tag-3-line"></i> <!-- Etiketlər üçün daha uyğun -->
                                <span>Google tags</span>
                            </a>
                        </li>
                    @endcan

                    @can('list-contacts')
                        <li>
                            <a href="{{ route('contacts.index') }}">
                                <i class="ri-mail-line"></i> <!-- Əlaqə mesajları üçün -->
                                <span>Əlaqə mesajları</span>
                            </a>
                        </li>
                    @endcan

                    @can('list-maps')
                        <li>
                            <a href="{{ route('maps.index') }}">
                                <i class="ri-map-pin-line"></i> <!-- Xəritə üçün -->
                                <span>Xəritə</span>
                            </a>
                        </li>
                    @endcan
                    @can('list-order_statuses')
                        <li>
                            <a href="{{ route('order_statuses.index') }}">
                                <i class="ri-map-pin-line"></i>
                                <span>Sifariş statusları</span>
                            </a>
                        </li>
                    @endcan
                    @can('list-banners')
                        <li>
                            <a href="{{ route('banners.index') }}">
                                <i class="ri-image-line"></i> <!-- Banner üçün -->
                                <span>Banner</span>
                            </a>
                        </li>
                    @endcan
                    @can('list-contact_socials')
                        <li>
                            <a href="{{ route('contact_socials.index') }}">
                                <i class="ri-links-line"></i> <!-- Əlaqə ikonları üçün -->
                                <span>Əlaqə iconları</span>
                            </a>
                        </li>
                    @endcan
                    @can('list-share_icons')
                        <li>
                            <a href="{{ route('share_icons.index') }}">
                                <i class="ri-share-line"></i> <!-- Paylaş ikonları üçün -->
                                <span>Paylaş ikonları</span>
                            </a>
                        </li>
                    @endcan
                    @can('list-prefixes')
                        <li>
                            <a href="{{ route('prefixes.index') }}">
                                <i class="ri-hashtag"></i> <!-- Prefikslər üçün -->
                                <span>Prefikslər</span>
                            </a>
                        </li>
                    @endcan
                    @can('list-working_hours')
                        <li>
                            <a href="{{ route('messages.index') }}">
                                <i class="ri-time-line"></i> <!-- İş saatları üçün -->
                                <span>İş saatları</span>
                            </a>
                        </li>
                    @endcan

                </ul>


            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->
