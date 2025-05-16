@extends('front.layouts.master')

@section('title', $customs_caclulator->seo_title)
@section('description', $customs_caclulator->seo_description)
@section('keywords', $customs_caclulator->seo_keywords)
@section('image', 'https://kasko.az/storage/869aeca8-d5c6-42ff-b754-5987d24d8e28.webp')
<style>
    .loader {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999; /* Make sure it stays on top */
        background: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        display: none; /* Hide by default */
    }

    .loader::after {
        content: '';
        display: inline-block;
        width: 50px;
        height: 50px;
        border: 3px solid #3498db; /* Loader color */
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>
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
    </div>  -->

    <div class="customs-calculator-container p-lr">
        <h1 class="title">{{$customs_caclulator->title}}</h1>
        <div class="customs-calculator">
            <div class="customs-calculator-form">
                <h2>{{$customs_caclulator->title}}</h2>
                <form id="calculatorForm" class="calculator-form">
                    @csrf
                    <div class="form-item">
                        <div class="form-item-selects">
                            <select name="autoType" id="autoType" required>
                                <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                                <option value="0">Minik avtomobili</option>
                            </select>
                        </div>
                        <label for="autoType">{{$words['type_of_ny']->translate(app()->getLocale())->title}}</label>

                    </div>
                    <div class="form-item">
                        <div class="form-item-selects">
                            <select name="engineType" id="engineType" required >
                                <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                                <option value="0">Benzin</option>
                                <option value="1">Dizel</option>
                                <option value="2">Qaz</option>
                                <option value="3">Hibrid Benzin</option>
                                <option value="4">Hibrid Dizel</option>
                                <option value="5">Elektrik</option>
                            </select>
                        </div>
                        <label for="engineType">{{$words['engine_size']->translate(app()->getLocale())->title}}</label>

                    </div>
                    <div class="form-line">
                        <div class="form-item">
                            <input type="number" id="price"  name="price" required min="0" max="999999999">
                            <label for="price">{{$words['invoice_fee']->translate(app()->getLocale())->title}}</label>
                        </div>
                        <div class="form-item">
                            <input required type="number" id="transportExpenses" name="transportExpenses">
                            <label for="transportExpenses">{{$words['ny_fee']->translate(app()->getLocale())->title}}</label>

                        </div>
                    </div>
                    <div class="form-line">
                        <div class="form-item">
                            <input required type="number" id="otherExpenses" name="otherExpenses" >
                            <label for="otherExpenses">{{$words['other_fee']->translate(app()->getLocale())->title}}</label>

                        </div>
                        <div class="form-item">
                            <input required type="number" id="engine" placeholder="1500" max="999999"  name="engine" step="1">
                            <label for="engine">{{$words['engine_size']->translate(app()->getLocale())->title}} (sm3)</label>

                        </div>
                    </div>
                    <div class="form-item">
                        <input class="datepicker" type="text" id="issueDate"  name="issueDate" required>
                        <i class="bi bi-calendar3 calendar-icon"></i>
                        <label for="issueDate">{{$words['make_year']->translate(app()->getLocale())->title}}</label>

                    </div>
                    <h3>{{$words['mense']->translate(app()->getLocale())->title}}</h3>
                    <div class="form-radio">
                        <input type="radio" name="commerceType" id="commerceType1" checked value="0">
                        <label for="commerceType1">{{$words['other_countries']->translate(app()->getLocale())->title}}</label>

                    </div>
                    <div class="form-radio">
                        <input type="radio" name="commerceType" id="commerceType2" value="1">
                        <label for="commerceType2">{{$words['azad_ticaret']->translate(app()->getLocale())->title}}</label>

                    </div>
                    <div class="form-buttons">
                        <button class="calculated-btn"  type="submit">{{$words['calculate']->translate(app()->getLocale())->title}}</button>
                        <a href="{{route('dynamic.page', $customs_caclulator->slug)}}" class="reset-calculated">{{$words['reset']->translate(app()->getLocale())->title}}</a>
                    </div>
                </form>

            </div>

            <div class="customs-calculator-result">
                <h2>{{$words['result']->translate(app()->getLocale())->title}}</h2>
                <div class="result-list" id="resultList">
                    <div class="result-list-item">
                        <h3>{{$words['idxal']->translate(app()->getLocale())->title}}</h3>
                        <div class="result-price">
                            <p>0</p>
                            <span>AZN</span>
                        </div>
                    </div>
                    <div class="result-list-item">
                        <h3>{{$words['edv']->translate(app()->getLocale())->title}}</h3>
                        <div class="result-price">
                            <p>0</p>
                            <span>AZN</span>
                        </div>
                    </div>
                    <div class="result-list-item">
                        <h3>{{$words['gomruk_yigimlari']->translate(app()->getLocale())->title}}</h3>
                        <div class="result-price">
                            <p>0</p>
                            <span>AZN</span>
                        </div>
                    </div>
                    <div class="result-list-item">
                        <h3>{{$words['aksiz_vergileri']->translate(app()->getLocale())->title}}</h3>
                        <div class="result-price">
                            <p>0</p>
                            <span>AZN</span>
                        </div>
                    </div>
                    <div class="result-list-item">
                        <h3>{{$words['vesiqe_haqqi']->translate(app()->getLocale())->title}}</h3>
                        <div class="result-price">
                            <p>0</p>
                            <span>AZN</span>
                        </div>
                    </div>
                    <div class="result-list-item">
                        <h3>{{$words['elektron_gomruk_haqqi']->translate(app()->getLocale())->title}}</h3>
                        <div class="result-price">
                            <p>0</p>
                            <span>AZN</span>
                        </div>
                    </div>
                    <div class="result-list-item">
                        <h3>{{$words['elektron_edv']->translate(app()->getLocale())->title}}</h3>
                        <div class="result-price">
                            <p>0</p>
                            <span>AZN</span>
                        </div>
                    </div>
                    <div class="result-list-item">
                        <h3>{{$words['utilization']->translate(app()->getLocale())->title}}</h3>
                        <div class="result-price">
                            <p>0</p>
                            <span>AZN</span>
                        </div>
                    </div>

                </div>
                <div class="calculator-result-price">
                    <h3>{{$words['total']->translate(app()->getLocale())->title}}</h3>
                    <div class="total-price" id="totalPrice">
                        <p>0</p>
                        <span>AZN</span>
                    </div>
                </div>
            </div>
            <div class="loader" style="display: none;"></div>

        </div>
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>

<script>
    $(document).ready(function () {
        // $('#issueDate').inputmask('99.99.9999', {});

        $('#calculatorForm').on('submit', function (e) {

            e.preventDefault();
            $('.loader').show();

            $.ajax({
                url: '{{ route("get_data") }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    // Clear previous results
                    $('.result-list').empty();
                    $('.total-price p').text(response.total); // Adjusted this line

                    $.each(response.data, function (index, item) {
                        $('.result-list').append(`
                            <div class="result-list-item">
                                <h3>${item.name}</h3>
                                <div class="result-price">
                                    <p>${item.value}</p>
                                    <span>AZN</span>
                                </div>
                            </div>
                        `);
                    });

                    // Show the results container if it's hidden
                    $('.customs-calculator-result').show();
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            console.log(value[0]);
                        });
                    } else {
                        console.log('An error occurred. Please try again.');
                    }
                },
                complete: function () {
                    // Hide the loader
                    $('.loader').hide();
                }
            });
        });
    });
</script>


