<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    @include('front.partials.head')
    <link rel="canonical" href="{{ request()->url() }}">
    <!-- Open Graph Tags for Social Media Sharing -->

    <meta property="og:site_name" content="Kasko">
    <meta property="og:url" content="{{ request()->url() }}">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image')">
    <meta name="twitter:image" content="@yield('image')">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:site" content="@YourTwitterHandle">
    <meta name="twitter:creator" content="@YourTwitterHandle">

    @yield('schema')
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          "name": "Kasko",
          "image": "https://kasko.az/storage/5ad973c7-eb3a-4355-a64c-f50e25359311.svg",
          "@id": "",
          "url": "https://kasko.az/",
          "telephone": "+994 50 484 83 00",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Heydər Əliyev prospekti",
            "addressLocality": "Baku",
            "postalCode": "",
            "addressCountry": "AZ"
          },
          "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
              "Monday",
              "Tuesday",
              "Wednesday",
              "Thursday",
              "Friday",
              "Saturday",
              "Sunday"
            ],
            "opens": "00:00",
            "closes": "23:59"
          },
          "sameAs": [
            "https://www.facebook.com/kasko.az/",
            "https://www.instagram.com/kasko.az/",
            "https://www.linkedin.com/company/kasko-az/"
          ]
        }
    </script>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "Kasko",
          "alternateName": "Sığorta şirkəti",
          "url": "https://kasko.az/",
          "logo": "https://kasko.az/storage/5ad973c7-eb3a-4355-a64c-f50e25359311.svg",
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+994 50 484 83 00",
            "contactType": "customer service",
            "areaServed": "AZ",
            "availableLanguage": ["en","Russian","Azerbaijani"]
          },
          "sameAs": [
            "https://www.facebook.com/kasko.az/",
            "https://www.instagram.com/kasko.az/",
            "https://www.linkedin.com/company/kasko-az/"
          ]
        }
    </script>


</head>

<body>

@include('front.partials.header')

@yield('content')

@include('front.partials.footer')

</body>
</html>
