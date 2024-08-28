<link rel="stylesheet" href="{{asset('/')}}front/style/style.css?v={{time()}}">
<link rel="stylesheet" href="{{asset('/')}}front/swiper/swiper.css?v={{time()}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="{{asset('/')}}front/jquery-nice-select-1.1.0/css/nice-select.css?v={{time()}}">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="icon" type="image/x-icon" href="{{asset('storage/' . $favicon->image)}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@foreach($tags as $tag)
    {!! $tag->description !!}
@endforeach
