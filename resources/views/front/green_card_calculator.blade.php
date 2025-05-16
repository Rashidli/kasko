@extends('front.layouts.master')

@section('title', $green_card_calculator->seo_title)
@section('description', $green_card_calculator->seo_description)
@section('keywords', $green_card_calculator->seo_keywords)
@section('image', 'https://kasko.az/storage/869aeca8-d5c6-42ff-b754-5987d24d8e28.webp')

@section('content')

    <div class="greencart-calculator-container p-lr">
        <h1 class="title">{{$green_card_calculator->title}}</h1>
        <h2 class="sub-title">{{$green_card_calculator->title}}</h2>
        <form action="" class="greencart-calculator-form">

            <div class="form-line">
                <div class="form-item">
                    <div class="form-item-selects">
                        <select id="country" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option id="tr" value="turkey">Türkiyə və İran İslam Respublikası</option>
                            <option id="rus" value="russia">Rusiya, Moldova və Ukrayna</option>
                            <option id="all" value="all">Yaşıl Kart sisteminə daxil olan bütün ölkələr</option>
                        </select>
                    </div>
                    <label for="">{{$words['direction']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <div class="form-item-selects">
                        <select id="vehicleType" onchange="carSelectorGreen()" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option id="car" value="minik">Minik</option>
                            <option id="bus" value="avtobus">Avtobus</option>
                            <option id="truck" value="yuk">Yük</option>
                            <option id="bike" value="motor">Motosiklet və Motorollerlər</option>
                            <option id="trailer" value="trailer">Qoşqular və Yarımqoşqular</option>
                            <option id="agriculture" value="heavy">Traktorlar və digər kənd təsərrüfatı</option>
                        </select>
                    </div>
                    <label for="">{{$words['type_of_ny']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <div class="form-line">
                <div  class="form-item" id="engineGreen">
                    <div class="form-item-selects">
                        <select id="engineGreen2" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="50_1500">50 sm3– 1500 sm3</option>
                            <option value="1501_2000">1501 sm3– 2000 sm3</option>
                            <option value="2001_2500">2001 sm3– 2500 sm3</option>
                            <option value="2501_3000">2501 sm3– 3000 sm3</option>
                            <option value="3001_3500">3001 sm3– 3500 sm3</option>
                            <option value="3501_4000">3501 sm3– 4000 sm3</option>
                            <option value="4001_4500">4001 sm3– 4500 sm3</option>
                            <option value="4501_5000">4501 sm3– 5000 sm3</option>
                            <option value="5000<">5000-dən çox sm3</option>
                        </select>
                    </div>
                    <label for="">{{$words['engine_size']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item" id="weightGreen" style="display: none;">
                    <div class="form-item-selects">
                        <select id="weightGreen2" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="3500">3500 kq-dan çox olmadıqda</option>
                            <option value="3501_7000">3501 kq – 7 000 kq</option>
                            <option value="7000<">7000 kq – dan yuxarı</option>
                        </select>
                    </div>
                    <label for="">{{$words['max-weight']->translate(app()->getLocale())->title}}</label>
                </div>
                <div  class="form-item" id="seatsGreen" style="display: none;" >
                    <div  class="form-item-selects">
                        <select id="seatsGreen2" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="9">9-16</option>
                            <option value="16">16-dan çox</option>
                        </select>
                    </div>
                    <label for="">{{$words['number_seat']->translate(app()->getLocale())->title}}</label>
                </div>
                <div class="form-item">
                    <div id="result" class="form-item-selects">
                        <select id="period" required>
                            <option value="">{{$words['choose_option']->translate(app()->getLocale())->title}}</option>
                            <option value="1">1 Ay</option>
                            <option value="3">3 Ay</option>
                            <option value="6">6 Ay</option>
                            <option value="12">12 Ay</option>
                        </select>
                    </div>
                    <label for="">{{$words['time_trip']->translate(app()->getLocale())->title}}</label>
                </div>
            </div>
            <button  class="submit_greencart_calculator" onclick="calc()" type="button" value="Hesabla">{{$words['calculate']->translate(app()->getLocale())->title}}</button>
        </form>
        <div class="greencart-calculator-result">
            <h2>{{$words['insurence_fee']->translate(app()->getLocale())->title}}: <span id="output"></span></h2>
            <a href="https://www.kasko.az/yasil-kart-sigortasi" target="_blank" class="order_greencart">{{$words['order_it']->translate(app()->getLocale())->title}}</a>
        </div>
    </div>

@endsection
<script>
    function carSelectorGreen() {
        var y = document.getElementById("vehicleType").value;

        if (y == "minik") {
            document.getElementById("engineGreen").style.display = "block";
            document.getElementById("weightGreen").style.display = "none";
            document.getElementById("seatsGreen").style.display = "none";
        } else if (y == "yuk") {
            document.getElementById("weightGreen").style.display = "block";
            document.getElementById("seatsGreen").style.display = "none";
            document.getElementById("engineGreen").style.display = "none";
        } else if (y == "avtobus") {
            document.getElementById("seatsGreen").style.display = "block";
            document.getElementById("weightGreen").style.display = "none";
            document.getElementById("engineGreen").style.display = "none";
        } else {
            document.getElementById("seatsGreen").style.display = "none";
            document.getElementById("weightGreen").style.display = "none";
            document.getElementById("engineGreen").style.display = "none";
        }
    }

    function calc() {
        let countryGreen = document.getElementById("country").value;
        let vehicleType = document.getElementById("vehicleType").value;
        let engineGreen = document.getElementById("engineGreen2").value;
        let seatsGreen = document.getElementById("seatsGreen2").value;
        let weightGreen = document.getElementById("weightGreen2").value;
        let periodGreen = document.getElementById("period").value;

        let lookUp = {
            "turkey": {
                "minik": {
                    "50_1500": {
                        "12": "80",
                        "6": "60",
                        "3": "40",
                        "1": "15"
                    },
                    "1501_2000": {
                        "12": "90",
                        "6": "70",
                        "3": "50",
                        "1": "17"
                    },
                    "2001_2500": {
                        "12": "100",
                        "6": "75",
                        "3": "60",
                        "1": "20"
                    }, "2501_3000": {
                        "12": "110",
                        "6": "80",
                        "3": "70",
                        "1": "22"
                    }, "3001_3500": {
                        "12": "130",
                        "6": "85",
                        "3": "75",
                        "1": "25"
                    }, "3501_4000": {
                        "12": "150",
                        "6": "90",
                        "3": "80",
                        "1": "30"
                    }, "4001_4500": {
                        "12": "170",
                        "6": "100",
                        "3": "90",
                        "1": "40"
                    }, "4501_5000": {
                        "12": "190",
                        "6": "120",
                        "3": "100",
                        "1": "50"
                    }, "5000<": {
                        "12": "220",
                        "6": "150",
                        "3": "120",
                        "1": "70"
                    }
                },
                "avtobus": {
                    "9": {
                        "12": "240",
                        "6": "180",
                        "3": "100",
                        "1": "80"
                    },
                    "16": {
                        "12": "360",
                        "6": "270",
                        "3": "160",
                        "1": "90"
                    }
                },
                "yuk": {
                    "3500": {
                        "12": "350",
                        "6": "230",
                        "3": "120",
                        "1": "80"
                    },
                    "3501_7000": {
                        "12": "400",
                        "6": "300",
                        "3": "170",
                        "1": "90"
                    },
                    "7000<": {
                        "12": "440",
                        "6": "330",
                        "3": "190",
                        "1": "110"
                    }
                },
                "motor": {
                    "12": "70",
                    "6": "50",
                    "3": "30",
                    "1": "12"
                },
                "trailer": {
                    "12": "70",
                    "6": "50",
                    "3": "30",
                    "1": "12"
                },
                "heavy": {
                    "12": "100",
                    "6": "75",
                    "3": "45",
                    "1": "25"
                }

            }, "all": {
                "minik": {
                    "50_1500": {
                        "12": "100",
                        "6": "70",
                        "3": "50",
                        "1": "30"
                    },
                    "1501_2000": {
                        "12": "150",
                        "6": "80",
                        "3": "60",
                        "1": "35"
                    },
                    "2001_2500": {
                        "12": "170",
                        "6": "90",
                        "3": "80",
                        "1": "45"
                    }, "2501_3000": {
                        "12": "200",
                        "6": "110",
                        "3": "90",
                        "1": "50"
                    }, "3001_3500": {
                        "12": "250",
                        "6": "140",
                        "3": "100",
                        "1": "55"
                    }, "3501_4000": {
                        "12": "300",
                        "6": "200",
                        "3": "120",
                        "1": "70"
                    }, "4001_4500": {
                        "12": "350",
                        "6": "240",
                        "3": "150",
                        "1": "80"
                    }, "4501_5000": {
                        "12": "380",
                        "6": "260",
                        "3": "170",
                        "1": "90"
                    }, "5000<": {
                        "12": "400",
                        "6": "280",
                        "3": "190",
                        "1": "100"
                    }
                },
                "avtobus": {
                    "9": {
                        "12": "600",
                        "6": "450",
                        "3": "270",
                        "1": "150"
                    },
                    "16": {
                        "12": "900",
                        "6": "650",
                        "3": "400",
                        "1": "230"
                    }
                },
                "yuk": {
                    "3500": {
                        "12": "600",
                        "6": "400",
                        "3": "250",
                        "1": "160"
                    },
                    "3501_7000": {
                        "12": "850",
                        "6": "600",
                        "3": "400",
                        "1": "250"
                    },
                    "7000<": {
                        "12": "1200",
                        "6": "850",
                        "3": "500",
                        "1": "290"
                    }
                },
                "motor": {
                    "12": "100",
                    "6": "70",
                    "3": "50",
                    "1": "30"
                },
                "trailer": {
                    "12": "120",
                    "6": "80",
                    "3": "60",
                    "1": "35"
                },
                "heavy": {
                    "12": "250",
                    "6": "180",
                    "3": "110",
                    "1": "60"
                }

            }, "russia": {
                "minik": {
                    "50_1500": {
                        "12": "50",
                        "6": "40",
                        "3": "25",
                        "1": "10"
                    },
                    "1501_2000": {
                        "12": "70",
                        "6": "60",
                        "3": "35",
                        "1": "12"
                    },
                    "2001_2500": {
                        "12": "80",
                        "6": "65",
                        "3": "40",
                        "1": "15"
                    }, "2501_3000": {
                        "12": "90",
                        "6": "75",
                        "3": "45",
                        "1": "17"
                    }, "3001_3500": {
                        "12": "100",
                        "6": "80",
                        "3": "50",
                        "1": "20"
                    }, "3501_4000": {
                        "12": "120",
                        "6": "85",
                        "3": "55",
                        "1": "25"
                    }, "4001_4500": {
                        "12": "150",
                        "6": "90",
                        "3": "60",
                        "1": "30"
                    }, "4501_5000": {
                        "12": "170",
                        "6": "95",
                        "3": "70",
                        "1": "40"
                    }, "5000<": {
                        "12": "190",
                        "6": "110",
                        "3": "80",
                        "1": "50"
                    }
                },
                "avtobus": {
                    "9": {
                        "12": "200",
                        "6": "150",
                        "3": "80",
                        "1": "60"
                    },
                    "16": {
                        "12": "300",
                        "6": "220",
                        "3": "130",
                        "1": "80"
                    }
                },
                "yuk": {
                    "3500": {
                        "12": "300",
                        "6": "200",
                        "3": "100",
                        "1": "50"
                    },
                    "3501_7000": {
                        "12": "330",
                        "6": "270",
                        "3": "150",
                        "1": "70"
                    },
                    "7000<": {
                        "12": "400",
                        "6": "300",
                        "3": "170",
                        "1": "80"
                    }
                },
                "motor": {
                    "12": "50",
                    "6": "40",
                    "3": "25",
                    "1": "10"
                },
                "trailer": {
                    "12": "50",
                    "6": "40",
                    "3": "25",
                    "1": "10"
                },
                "heavy": {
                    "12": "80",
                    "6": "60",
                    "3": "40",
                    "1": "20"
                }

            }
        };

        if (document.getElementById("vehicleType").value == "minik") {
            document.getElementById("output").innerHTML = lookUp[countryGreen][vehicleType][engineGreen][periodGreen] + ".00 AZN";
            document.getElementById('result').scrollIntoView({ behavior: 'smooth' });
        } else if (document.getElementById("vehicleType").value == "avtobus") {
            document.getElementById("output").innerHTML = lookUp[countryGreen][vehicleType][seatsGreen][periodGreen] + ".00 AZN"
            document.getElementById('result').scrollIntoView({ behavior: 'smooth' });
        } else if (document.getElementById("vehicleType").value == "yuk") {
            document.getElementById("output").innerHTML = lookUp[countryGreen][vehicleType][weightGreen][periodGreen] + ".00 AZN"
            document.getElementById('result').scrollIntoView({ behavior: 'smooth' });
        } else {
            document.getElementById("output").innerHTML = lookUp[countryGreen][vehicleType][periodGreen] + ".00 AZN"
            document.getElementById('result').scrollIntoView({ behavior: 'smooth' });
        }
    }
</script>
