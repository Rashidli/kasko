<link rel="stylesheet" href="{{asset('/')}}front/style/style.css?v={{time()}}">
<link rel="stylesheet" href="{{asset('/')}}front/style/custom.css?v={{time()}}">
<link rel="stylesheet" href="{{asset('/')}}front/swiper/swiper.css?v={{time()}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
<link rel="icon" type="image/x-icon" href="{{asset('storage/' . $favicon->image)}}">
<link rel="preload" href="{{asset('/')}}front/bootstrap/bootstrap-icons.min.css" as="style" onload="this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{asset('/')}}front/bootstrap/bootstrap-icons.min.css"></noscript>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@foreach($tags as $tag)
    {!! $tag->description !!}
@endforeach
