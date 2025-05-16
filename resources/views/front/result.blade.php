@extends('front.layouts.master')

@section('title', 'Gömrük Kalkulyatoru')
@section('description', 'Gömrük Kalkulyatoru')
@section('keywords', 'Gömrük Kalkulyatoru')

@section('content')

    <!-- <div class="page-direction p-lr">
        <a href="{{route('welcome')}}" class="prev-page">
            Ana səhifə
        </a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_171_1378)">
                <path d="M4.1665 10H15.8332" stroke="black" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M12.5 13.3333L15.8333 10" stroke="black" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
                <path d="M12.5 6.66666L15.8333 9.99999" stroke="black" stroke-width="1.5" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </g>
            <defs>
                <clipPath id="clip0_171_1378">
                    <rect width="20" height="20" fill="white"/>
                </clipPath>
            </defs>
        </svg>
        <a href="javascript: void(0)" class="current-page">
            Gömrük Kalkulyatoru
        </a>
    </div> -->

    <div class="customs-calculator-container p-lr">
        <h1 class="title">Gömrük Kalkulyatoru</h1>
        <div class="customs-calculator">
            <div class="customs-calculator-form">
                <h2>Gömrük rüsumu kalkulyatoru</h2>
                <form action="{{route('get_data')}}" method="post" class="calculator-form">
                    @csrf
                    <div class="form-item">
                        <select name="autoType" id="">
                            <option value="">Seçin</option>
                            <option value="0"{{$postData['autoType'] == 0  ? 'selected' : ''}}>Minik avtomobili</option>
                        </select>
                        <label for="">Nəqliyyat vasitəsinin növü</label>
                        <div class="error-message">Doldur</div>
                    </div>
                    <div class="form-item">
                        <select name="engineType" id="">
                            <option value="">Seçin</option>
                            <option value="0" {{$postData['engineType'] == 0  ? 'selected' : ''}}>Benzin</option>
                            <option value="1" {{$postData['engineType'] == 1  ? 'selected' : ''}}>Dizel</option>
                            <option value="2" {{$postData['engineType'] == 2  ? 'selected' : ''}}>Qaz</option>
                            <option value="3" {{$postData['engineType'] == 3  ? 'selected' : ''}}>Hibrid Benzin</option>
                            <option value="4" {{$postData['engineType'] == 4  ? 'selected' : ''}}>Hibrid Dizel</option>
                            <option value="5" {{$postData['engineType'] == 5  ? 'selected' : ''}}>Elektrik</option>
                        </select>
                        <label for="">Mühərrikin növü</label>
                        <div class="error-message">Doldur</div>
                    </div>
                    <div class="form-line">
                        <div class="form-item">
                            <input type="number" name="price" value="{{$postData['price']}}">
                            <label for="" >İnvoys dəyəri (USD)</label>
                            <div class="error-message">Doldur</div>
                        </div>
                        <div class="form-item">
                            <input type="number" name="transportExpenses" value="{{$postData['transportExpenses'] == 0 ? '' : $postData['transportExpenses']}}">
                            <label for="">Nəqliyyat xərci (USD)</label>
                            <div class="error-message">Doldur</div>
                        </div>
                    </div>
                    <div class="form-line">
                        <div class="form-item">
                            <input type="number"  name="otherExpenses" value="{{$postData['otherExpenses'] == 0 ? '' : $postData['otherExpenses']}}">
                            <label for="" >Digər xərclər (USD)</label>
                            <div class="error-message">Doldur</div>
                        </div>
                        <div class="form-item">
                            <input type="number" value="{{$postData['engine']}}" name="engine">
                            <label for="">Mühərrikin həcmi (sm3)</label>
                            <div class="error-message">Doldur</div>
                        </div>
                    </div>
                    <div class="form-item">
                        <input type="date" name="issueDate" value="{{ \Carbon\Carbon::parse($postData['issueDate'])->format('Y-d-m') }}">
                        <label for="">İstehsal tarixi</label>
                        <div class="error-message">Doldur</div>
                    </div>
                    <h3>Mənşə (istehsal) ölkəsi və göndərən ölkə haqqında</h3>
                    <div class="form-radio">
                        <input type="radio" {{$postData['commerceType'] == 0  ? 'checked' : ''}} name="commerceType" checked value="0">
                        <label for="">Digər ölkələr</label>
                    </div>
                    <div class="form-radio">
                        <input type="radio" {{$postData['commerceType'] == 1  ? 'checked' : ''}} name="commerceType" value="1">
                        <label for="">Azad ticarət sazişi bağlanan ölkədə istehsal olunub və oradan gətirilir </label>
                    </div>
                    <div class="form-buttons">
                        <button class="calculated-btn" type="submit">Hesabla</button>
                        <a href="{{route('calculator')}}" class="reset-calculated" type="submit">Sıfırla</a>
                    </div>
                </form>
            </div>
            <div class="customs-calculator-result">
                <h2>Nəticə</h2>
                <div class="result-list">
                    @foreach($response['data']['autoDuty']['duties'] as $data)
                        <div class="result-list-item">
                            <h3>{{ $data['name'] }}</h3>
                            <div class="result-price">
                                <p>{{ number_format($data['value'], 2) }}</p>
                                <span>AZN</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="calculator-result-price">
                    <h3>Cəmi</h3>
                    <div class="total-price">
                        <p>{{ number_format($response['data']['autoDuty']['total']['value'], 2) }}</p>
                        <span>AZN</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
<script>
    $(document).ready(function(){
        $('#issueDate').inputmask('99.99.9999', {

        });
    });
</script>
