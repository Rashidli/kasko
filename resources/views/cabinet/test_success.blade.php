@extends('cabinet.layouts.master')

@section('title', 'İcbari əmlak siğortası.')

@section('content')

    <div class="container-content">
        <article class="title-head-add-contract">
            <a href="/insurance_products.html" class="icon-to-back">
                <img src="{{asset('/')}}cabinet/images/Reply.svg" alt="" />
                <p>Geri</p>
            </a>
{{--            <h1>Səyahət sığortası</h1>--}}
        </article>

        <form class="kasko-insurance-form" accept-charset="UTF-8">
{{--            <div class="title-form">--}}
{{--                <h3>Səyahət sığortası müraciət formu</h3>--}}
{{--            </div>--}}
            <div class="form-content-success">
                <div class="success">
                    <div class="wrapper-vector">
                        <img src="{{asset('/')}}cabinet/images/Vector.svg" alt="success" title="Successfully!" />
                    </div>
                    <div class="texts">
                        <h1>Müraciətiniz uğurla göndərildi!</h1>
                        <p>Müraciəriniz üçün təşəkkür edirik, sizinlə ən qısa zamanda əlaqə saxlayacağıq.</p>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

