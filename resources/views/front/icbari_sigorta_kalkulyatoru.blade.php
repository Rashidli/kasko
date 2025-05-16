@extends('front.layouts.master')

@section('title', $icbari_sigorta_kalkulyatoru->seo_title)
@section('description', $icbari_sigorta_kalkulyatoru->seo_description)
@section('keywords', $icbari_sigorta_kalkulyatoru->seo_keywords)
@section('image', 'https://kasko.az/storage/869aeca8-d5c6-42ff-b754-5987d24d8e28.webp')

@section('content')

<div class="icbari-calculator-container p-lr">
        <h1 class="title">{{$icbari_sigorta_kalkulyatoru->title}}</h1>
        <h2 class="sub-title">{{$icbari_sigorta_kalkulyatoru->title}}</h2>
        <form action="{{route('calculate_icbari')}}" id="icbariForm"  method="get">
            <div class="form-line">
                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="C3" id="vehicleType" onchange="updateSubOptions()">
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option data-value="cars" value="Minik avtomobilləri və onların bazasında istehsal edilmiş digər NV">Minik avtomobilləri və onların bazasında istehsal edilmiş digər NV</option>
                            <option data-value="buses" value="Avtobuslar, mikroavtobuslar və onların bazasında istehsal edilmiş digər NV">Avtobuslar, mikroavtobuslar və onların bazasında istehsal edilmiş digər NV</option>
                            <option data-value="trucks" value="Yük avtomobilləri və onların bazasında istehsal edilmiş digər NV">Yük avtomobilləri və onların bazasında istehsal edilmiş digər NV</option>
                            <option data-value="motorcycles" value="Motosikletlər və motorollerlər">Motosikletlər və motorollerlər</option>
                            <option data-value="trailers" value="Qoşqular və yarımqoşqular">Qoşqular və yarımqoşqular</option>
                            <option data-value="tractors" value="Traktorlar, yol-tikinti işlərində, meşə və kənd təsərrüfatında istifadə olunan NV">Traktorlar, yol-tikinti işlərində, meşə və kənd təsərrüfatında istifadə olunan NV</option>
                            <option data-value="trolleybus" value="Trolleybuslar və tramvaylar">Trolleybuslar və tramvaylar</option>
                        </select>
                    </div>
                    <label for="vehicleType">{{$words['type_of_ny']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="C4" id="vehicleSubType">
                            <option value="">{{$words['type_of_ny_alt']->translate(app()->getLocale())->title}}</option>
                            <!-- Dynamic options will be inserted here -->
                        </select>
                    </div>
                    <label for="vehicleSubType">{{$words['type_of_ny_alt']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">
                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="C5"  required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="Fiziki">Fiziki</option>
                            <option value="Hüquqi">Hüquqi</option>
                        </select>
                    </div>
                    <label for="">{{$words['human_ny']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="C6" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="Yalnız bir şəxs">Yalnız bir şəxs</option>
                            <option value="İki və ya daha çox şəxs">İki və ya daha çox şəxs</option>
                        </select>
                    </div>
                    <label for="">{{$words['count_human']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">
                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="C7" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="16-25">16-25</option>
                            <option value="26-29">26-29</option>
                            <option value="30-39">30-39</option>
                            <option value="40-49">40-49</option>
                            <option value="50-65">50-65</option>
                            <option value="65+">65-dən yuxarı</option>
                        </select>
                    </div>
                    <label for="">{{$words['age_human']->translate(app()->getLocale())->title}}</label>
                </div>

                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="C8" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="1 il-dən az">1 ildən az</option>
                            <option value="1 il">1 il</option>
                            <option value="2 il">2 il</option>
                            <option value="3−4 il">3-4 il</option>
                            <option value="5−6 il">5-6 il</option>
                            <option value="7−10 il">7-10 il</option>
                            <option value="10 ildən yuxarı">10 ildən yuxarı</option>
                        </select>
                    </div>
                    <label for="">{{$words['experience_human']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">
                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="C9" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="0 - 10 il">0 - 10 il</option>
                            <option value="11 - 20 il">11 - 20 il</option>
                            <option value="20 ildən artıq müddət">20 ildən artıq müddət</option>
                        </select>
                    </div>
                    <label for="">{{$words['experience_human']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="C10" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="Bakı şəhəri, Mərkəzləşdirilmiş şəkildə uçota alınmış">Bakı şəhəri, Mərkəzləşdirilmiş şəkildə uçota alınmış</option>
                            <option value="Sumqayıt şəhəri, Abşeron rayonu">Sumqayıt şəhəri, Abşeron rayonu</option>
                            <option value="Naxçıvan Muxtar Respublikası, Gəncə şəhəri">Naxçıvan Muxtar Respublikası, Gəncə şəhəri</option>
                            <option value="Digər şəhər və rayonlar">Digər şəhər və rayonlar</option>
                        </select>
                    </div>
                    <label for="">{{$words['ny_area']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">
                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="C11" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="0.6">0.6</option>
                            <option value="0.65">0.65</option>
                            <option value="0.7">0.7</option>
                            <option value="0.75">0.75</option>
                            <option value="0.8">0.8</option>
                            <option value="0.85">0.85</option>
                            <option value="0.9">0.9</option>
                            <option value="0.95">0.95</option>
                            <option value="1">1</option>
                            <option value="1">1.1</option>
                            <option value="1.2">1.2</option>
                            <option value="1.3">1.3</option>
                            <option value="1.4">1.4</option>
                            <option value="1.5">1.5</option>
                            <option value="1.6">1.6</option>
                            <option value="1.8">1.8</option>
                            <option value="2">2</option>
                            <option value="2.2">2.2</option>
                            <option value="2.4">2.4</option>
                            <option value="2.6">2.6</option>
                            <option value="2.8">2.8</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <label for="">{{$words['bonus_malus']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <div class="form-item-selects">
                        <select name="C12" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4 və daha çox">4 və daha çox</option>
                        </select>
                    </div>
                    <label for="">{{$words['crash_count']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">
                <div class="form-item" id="icbariResult1">
                    <div class="form-item-selects">
                        <select name="C13" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="275 gündən az">275 gündən az</option>
                            <option value="275 gündən çox">275 gündən çox</option>
                        </select>
                    </div>
                    <label for="">{{$words['fbms_count']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <button type="submit" class="submit_icbari_calculator">{{$words['calculate']->translate(app()->getLocale())->title}}</button>
            <div id="loader" style="display: none;">Hesablanır...</div>


        </form>
    <div  id="icbariResult">
        <div class="icbariResult-inner">
            <h2>{{$words['insurence_fee']->translate(app()->getLocale())->title}}: <span id="output"></span></h2>
            <a href="https://www.kasko.az/icbari-avto-sigorta" target="_blank" class="order_kasko">{{$words['order_it']->translate(app()->getLocale())->title}}</a>
        </div>

    </div>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#icbariForm').on('submit', function(e) {
            e.preventDefault(); // Prevent form from submitting normally

            $('#loader').show(); // Show the loader

            $.ajax({
                url: $(this).attr('action'), // Use the form's action attribute
                method: $(this).attr('method'), // Use the form's method attribute
                data: $(this).serialize(), // Serialize form data
                success: function(response) {
                    // Hide the loader
                    $('#loader').hide();

                    // Display the result in the result div
                    $('#output').text(response.result);

                    // Smooth scroll to the result div
                    $('html, body').animate({
                        scrollTop: $('#icbariResult1').offset().top
                    }, 800);
                },
                error: function(xhr) {
                    // Hide the loader
                    $('#loader').hide();

                    // Handle error (e.g., validation error)
                    $('#output').html('Xəta baş verdi, yenidən yoxlayın.');
                }
            });
        });
    });

    function updateSubOptions() {
        const vehicleSubType = document.getElementById("vehicleSubType");
        const vehicleType = document.getElementById("vehicleType");
        const selectedDataValue = vehicleType.options[vehicleType.selectedIndex].getAttribute("data-value");

        vehicleSubType.innerHTML = "";

        const options = {
            cars: [
                { text: "50 sm3 – 1500 sm3", value: "50 sm3 – 1500 sm3" },
                { text: "1501 sm3 – 2000 sm3", value: "1501 sm3 – 2000 sm3" },
                { text: "2 001 sm3 – 2500 sm3", value: "2 001 sm3 – 2500 sm3" },
                { text: "2501 sm3 – 3000 sm3", value: "2501 sm3 – 3000 sm3" },
                { text: "3001 sm3 – 3500 sm3", value: "3001 sm3 – 3500 sm3" },
                { text: "3501 sm3 – 4000 sm3", value: "3501 sm3 – 4000 sm3" },
                { text: "4001 sm3 – 4500 sm3", value: "4001 sm3 – 4500 sm3" },
                { text: "4501 sm3 – 5000 sm3", value: "4501 sm3 – 5000 sm3" },
                { text: "5000 sm3-dən çox", value: "5000 sm3 -dən çox" },
                { text: "Elektrik mühərrikli", value: "Elektrik mühərrikli" },
            ],
            buses: [
                { text: "9 – 16 sərnişin yeri", value: "9 - 16" },
                { text: "16-dan artıq sərnişin yeri", value: "16-dan artıq" },
                { text: "Elektrik mühərrikli", value: "Elektrik mühərrikli" },
            ],
            trucks: [
                { text: "3500 kq-dan çox olmadıqda", value: "3 500 kq-dan az" },
                { text: "3501 kq – 7500 kq", value: "3 501 kq - 7 000 kq" },
                { text: "7500 kq-dan yuxarı", value: "7 000 kq-dan artıq" },
                { text: "Elektrik mühərrikli", value: "Elektrik mühərrikli" },
            ],
            motorcycles: [
                { text: "Motosikletlər və motorollerlər", value: "Motosikletlər və motorollerlər" },
                { text: "Elektrik mühərrikli", value: "Elektrik mühərrikli" },
            ],
            trolleybus: [
                { text: "Trolleybuslar və tramvaylar", value: "Trolleybuslar və tramvaylar" },
                { text: "Elektrik mühərrikli", value: "Elektrik mühərrikli" },
            ],
            tractors: [
                { text: "Traktorlar, yol-tikinti", value: "Traktorlar, yol-tikinti" },
                { text: "Elektrik mühərrikli", value: "Elektrik mühərrikli" },
            ],
            trailers: [
                { text: "Qoşqular və yarımqoşqular", value: "Qoşqular və yarımqoşqular" },
                { text: "Elektrik mühərrikli", value: "Elektrik mühərrikli" },
            ]
        };

        // Add options based on the selected type
        if (options[selectedDataValue]) {
            options[selectedDataValue].forEach(option => {
                const opt = document.createElement("option");
                opt.value = option.value;
                opt.text = option.text;
                vehicleSubType.add(opt);
            });
        }
    }


</script>
