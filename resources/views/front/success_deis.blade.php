@extends('front.layouts.master')

@section('title', 'Success')
@section('description', 'Success')
@section('keywords', 'Success')

@section('content')

    <div class="success-deis-container p-lr">
        <h2 class="title">Əmlak sığortanızı ödəyin</h2>
{{--        <div class="short-desc">--}}
{{--            <p>Lorem ipsum dolor sit amet.</p>--}}
{{--            <p>Lorem ipsum dolor sit amet.</p>--}}
{{--        </div>--}}
        <h3 class="success-text">Siğortanız uğurla qeydiyyata alındı!</h3>
        <!-- <h3 class="unsuccess-text">Lorem, ipsum dolor!</h3> -->
        <div class="payment-code">
            <p>Ödəniş kodunuz:</p>
            <span>{{$payment_code}}</span>
        </div>
        <div class="other-payment-methods">
            <a class="payment-method-item" href="https://expresspay.az/payment/service/980">
                <img src="https://banco.az/sites/default/files/news/express_pay.jpg" alt="">
            </a>
            <a class="payment-method-item" href="https://www.million.az/services/insurance/ISB">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7Emh7HSw2r9IxqDUdgw_t7j1L3A-BfCJumwGAEeaj8eoiJK7oaJZpZFdzQyMTBGKs7ZU&usqp=CAU" alt="">
            </a>
        </div>
    </div>

@endsection
