

const serviceForm = document.querySelector(".service_single_form");
if (serviceForm) {
    const send_form = serviceForm.querySelector('.send-form');
    send_form?.addEventListener("click", () => {
        const inputs = serviceForm.querySelectorAll('input:required, select:required');
        let isValid = true;

        inputs.forEach(function (input) {
            const formItem = input.closest('.form-item');
            const formItemSelects = input.closest('.form-item-selects');
            const phoneInputWrapper = input.closest('.phone-input');

            // Custom validation for datepicker
            const isDatePicker = input.classList.contains('datepicker');
            const isDateValid = isDatePicker ? input.value.trim() !== "" : input.checkValidity();

            if (!isDateValid) {
                isValid = false;
                if (phoneInputWrapper) {
                    phoneInputWrapper.classList.add('required-invalid');
                }
                if (formItemSelects) {
                    formItemSelects.classList.add('required-invalid');
                }
                if (formItem) {
                    formItem.classList.add('required-invalid');
                }
                if (!phoneInputWrapper) {
                    input.classList.add('required-invalid');
                }
            } else {
                if (phoneInputWrapper) {
                    phoneInputWrapper.classList.remove('required-invalid');
                }
                if (formItemSelects) {
                    formItemSelects.classList.remove('required-invalid');
                }
                if (formItem) {
                    formItem.classList.remove('required-invalid');
                }
                if (!phoneInputWrapper) {
                    input.classList.remove('required-invalid');
                }
            }
        });
    });
}

const contactForm = document.querySelector(".FormContact");
if (contactForm) {
    const sendForm = contactForm.querySelector('.send-form');

    if (sendForm) {
        sendForm.addEventListener("click", (event) => {
            let isValid = true;

            const inputs = contactForm.querySelectorAll('input:required, textarea:required');
            inputs.forEach(function (input) {
                if (!input.checkValidity()) {
                    isValid = false;
                    let parent = input.parentElement;
                    while (parent) {
                        if (parent.classList.contains('form_phone')) {
                            parent.classList.add('required-invalid');
                            break;
                        }
                        parent = parent.parentElement;
                    }

                    if (!parent || !parent.classList.contains('form_phone')) {
                        input.classList.add('required-invalid');
                    }
                } else {
                    let parent = input.parentElement;
                    while (parent) {
                        if (parent.classList.contains('form_phone')) {
                            parent.classList.remove('required-invalid');
                            break;
                        }
                        parent = parent.parentElement;
                    }

                    if (!parent || !parent.classList.contains('form_phone')) {
                        input.classList.remove('required-invalid');
                    }
                }
            });
            if (!isValid) {
                event.preventDefault();
            }
        });
    }
}
const calculator_form = document.querySelector(".calculator-form");

if (calculator_form) {
    const send_form = calculator_form.querySelector('.calculated-btn');
    send_form?.addEventListener("click", () => {
        const inputs = calculator_form.querySelectorAll('input:required, select:required');
        let isValid = true; // Başlangıçta geçerli kabul edilir

        inputs.forEach(function (input) {
            const formItemSelects = input.closest('.form-item-selects');
            const isDatePicker = input.classList.contains('datepicker');
            const isDateValid = isDatePicker ? input.value.trim() !== "" : input.checkValidity();

            if (!isDateValid) {
                isValid = false;
                input.classList.add('required-invalid');

                if (formItemSelects) {
                    formItemSelects.classList.add('required-invalid');
                }
            } else {
                input.classList.remove('required-invalid');

                if (formItemSelects) {
                    formItemSelects.classList.remove('required-invalid');
                }
            }
        });

    });
}


const kaskoForm = document.getElementById("kaskoForm");

if (kaskoForm) {
    const sendForm = kaskoForm.querySelector('.submit_kasko_calculator');
    if (sendForm) {
        sendForm.addEventListener("click", (event) => {
            let isValid = true; // Varsayılan olarak geçerli

            const inputs = kaskoForm.querySelectorAll('input:required, select:required');
            inputs.forEach(function (input) {
                const phoneInputWrapper = input.closest('.phone-input'); // phone-input sınıfı kontrolü

                // Datepicker kontrolü
                const isDatePicker = input.classList.contains('datepicker');
                const isDateValid = isDatePicker ? input.value.trim() !== "" : input.checkValidity();

                // Geçerlilik kontrolü
                const isInvalid = !isDateValid ||
                    (input.type === "number" && (input.value === "")); // Sadece boş kontrolü, 0 geçerli

                if (isInvalid) {
                    isValid = false; // Geçersiz bir alan varsa isValid false olur

                    // Eğer phone-input içinde değilse input'a required-invalid ekle
                    if (!phoneInputWrapper) {
                        if (input.tagName.toLowerCase() === 'select') {
                            const parent = input.parentElement; // Select'in parent öğesi
                            if (parent) {
                                parent.classList.add('required-invalid'); // Ebeveynine sınıf ekle
                            }
                        } else {
                            input.classList.add('required-invalid'); // Input'a sınıf ekle
                        }
                    }

                    // Eğer phone-input içindeyse sadece kendisine required-invalid ekle
                    if (phoneInputWrapper) {
                        // Phone-input içerisindeki select'e required-invalid ekleme
                        const phoneSelect = phoneInputWrapper.querySelector('select'); // Telefon seçimini al
                        if (phoneSelect) {
                            const parent = phoneSelect.parentElement; // Select'in parent öğesi
                            if (parent) {
                                parent.classList.add('required-invalid'); // Ebeveynine sınıf ekle
                            }
                        }
                    }
                } else {
                    // Geçerli olanlardan sınıfı kaldır
                    // Eğer phone-input içinde değilse input'tan required-invalid sınıfını kaldır
                    if (!phoneInputWrapper) {
                        if (input.tagName.toLowerCase() === 'select') {
                            const parent = input.parentElement; // Select'in parent öğesi
                            if (parent) {
                                parent.classList.remove('required-invalid'); // Ebeveyninden sınıfı kaldır
                            }
                        } else {
                            input.classList.remove('required-invalid'); // Input'tan sınıfı kaldır
                        }
                    }

                    // Eğer phone-input içindeyse sadece kendisine required-invalid ekle
                    if (phoneInputWrapper) {
                        // Phone-input içerisindeki select için required-invalid sınıfını kaldır
                        const phoneSelect = phoneInputWrapper.querySelector('select'); // Telefon seçimini al
                        if (phoneSelect) {
                            const parent = phoneSelect.parentElement; // Select'in parent öğesi
                            if (parent) {
                                parent.classList.remove('required-invalid'); // Ebeveyninden sınıfı kaldır
                            }
                        }
                    }
                }
            });

            // Eğer form geçersizse sayfa yenilenmesini engelle
            if (!isValid) {
                event.preventDefault(); // Formun gönderilmesini engeller
            }
        });
    }
}


const icbariForm = document.getElementById("icbariForm");

if (icbariForm) {
    const send_form = document.querySelector(".submit_icbari_calculator");
    send_form?.addEventListener("click", () => {
        const selects = icbariForm.querySelectorAll('select');
        let isValid = true; // Başlangıçta geçerli kabul edilir

        selects.forEach(function (select) {
            const formItemSelects = select.closest('.form-item-selects');

            // Select'in değeri boş mu kontrol edilir
            if (select.value.trim() === "") {
                isValid = false;
                select.classList.add('required-invalid');

                if (formItemSelects) {
                    formItemSelects.classList.add('required-invalid');
                }
            } else {
                select.classList.remove('required-invalid');

                if (formItemSelects) {
                    formItemSelects.classList.remove('required-invalid');
                }
            }
        });
    });
}



const greenCartForm = document.querySelector(".greencart-calculator-form");

if (greenCartForm) {
    const send_form = greenCartForm.querySelector('.submit_greencart_calculator');

    send_form?.addEventListener("click", (event) => {
        let isValid = true; // Varsayılan olarak geçerli

        const selects = greenCartForm.querySelectorAll('select:required');
        selects.forEach(function (select) {
            if (!select.checkValidity()) {
                isValid = false; // Geçersiz bir alan varsa isValid false olur

                // `form-item-selects` sınıfı için kontrol
                const selectWrapper = select.closest('.form-item-selects');
                if (selectWrapper) {
                    selectWrapper.classList.add('required-invalid');
                }

                // Geçersiz olan select için required-invalid sınıfını ekle
                select.classList.add('required-invalid');
            } else {
                // Geçerli olanlardan sınıfı kaldır

                // `form-item-selects` sınıfı için kontrol
                const selectWrapper = select.closest('.form-item-selects');
                if (selectWrapper) {
                    selectWrapper.classList.remove('required-invalid');
                }

                // Geçerli select için required-invalid sınıfını kaldır
                select.classList.remove('required-invalid');
            }
        });

        // Eğer form geçersizse sayfa yenilenmesini engelle
        if (!isValid) {
            event.preventDefault(); // Formun gönderilmesini engeller
        }
    });
}

const numberInputs = document.querySelectorAll('input[type="number"]');
numberInputs.forEach(input => {
    input.addEventListener('keydown', function (e) {
        // Nokta karakterinin girilmesini engelle
        if (e.key === '.' || e.key === ',') { // Farklı tarayıcılarda ',' kullanılması da olasıdır
            e.preventDefault();
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    // Tüm table elementlerini seç
    const tables = document.querySelectorAll('.content-texts table');

    // Her bir table elementini dolaş
    tables.forEach(table => {
        // Yeni bir div oluştur
        const serviceDiv = document.createElement('div');
        // Div'e service_table class'ını ekle
        serviceDiv.classList.add('service_table');
        // Table'yi serviceDiv'in içine taşı
        table.parentNode.insertBefore(serviceDiv, table);
        serviceDiv.appendChild(table);

        // service_table'ın parent'ını kontrol et
        const parentDiv = serviceDiv.parentNode;

        // Eğer parent bir div ise ve class'ı yoksa, width'i %100 yap
        if (parentDiv && parentDiv.tagName === 'DIV' && !parentDiv.classList.length) {
            parentDiv.style.maxWidth = '100%';
        }
    });


    const tablesNews = document.querySelectorAll('.news-detail-texts table');

    // Her bir table elementini dolaş
    tablesNews.forEach(table => {
        // Yeni bir div oluştur
        const detailDiv = document.createElement('div');
        // Div'e service_table class'ını ekle
        detailDiv.classList.add('detail_table');
        // Table'yi serviceDiv'in içine taşı
        table.parentNode.insertBefore(detailDiv, table);
        detailDiv.appendChild(table);
    });

})



document.querySelectorAll('.news-cart-body p').forEach(p => {
    if (!p.textContent.trim()) p.style.display = 'none';
});






const current_langs = document.querySelectorAll(".current_lang")
const other_langs = document.querySelector(".other_langs")

current_langs.forEach(item => {
    item?.addEventListener("click", () => {
        item.nextElementSibling.classList.toggle("active")
    })
})
const scrollButton = document.querySelector(".scrollButton");

if (scrollButton) {
    window.addEventListener("scroll", () => {
        if (window.scrollY > 100) {
            scrollButton.style.opacity = 1;
        } else {
            scrollButton.style.opacity = 0;
        }
    });

    scrollButton.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}


var home_hero = new Swiper(".home-hero-slide", {
    loop: true,
    speed: 2500,
    slidesPerView: 1,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 2500,
    }
});

document.querySelectorAll('input[type="date"]').forEach(function (dateInput) {
    dateInput.addEventListener('keypress', function (event) {
        // Eğer harf girilmeye çalışılıyorsa, engelle
        if (event.key.match(/[a-zA-Z]/)) {
            event.preventDefault();
        }
    });
});

const hamburger = document.querySelector(".hamburger")
const mobile_menu = document.querySelector(".mobile_menu")
const close_menu = document.querySelector(".close-menu")
hamburger.addEventListener("click", () => {
    mobile_menu.style.left = "0"
})
close_menu.addEventListener("click", () => {
    mobile_menu.style.left = "-200%"
})

const mobile_menu_link = document.querySelectorAll(".mobile_menu_link");
mobile_menu_link.forEach(item => {
    item?.addEventListener("click", () => {
        mobile_menu.style.left = "-200%"
    })
})

var home_news = new Swiper(".home-news-slide", {
    speed: 2500,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 2500,
    },
    breakpoints: {
        // when window width is >= 320px
        1250: {
            slidesPerView: 3,
        },
        // when window width is >= 480px
        992: {
            slidesPerView: 2,
        },
        // when window width is >= 640px
        0: {
            slidesPerView: "auto",
        }
    }
});

var news_detail_slide = new Swiper(".news-detail-slide", {
    speed: 2500,
    slidesPerView: "auto",
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 2500,
    }
});

var latest_news = new Swiper(".lastest_news", {
    loop: true,
    speed: 2500,
    slidesPerView: "auto",
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 2500,
    }
});
var most_read_news_swiper = new Swiper(".most-read-news-swiper", {
    speed: 2500,
    slidesPerView: "auto",
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 2500,
    }
});


const footer_section_title = document.querySelectorAll('.footer-section-title')
footer_section_title.forEach(item => {
    item?.addEventListener('click', function () {
        let footer_section = item.parentElement;
        closeFooterLink(footer_section);
        if (footer_section.classList.contains("active")) footer_section.classList.remove('active');
        else footer_section.classList.add("active");
    })
})
function closeFooterLink(footerLinks) {
    footer_section_title.forEach(item => {
        let footer_section = item.parentElement;
        if (footerLinks != footer_section) footer_section.classList.remove("active");
    })
}



const copiedBtn = document.querySelector('.simply_link');
const copiedTxt = document.querySelector('.copied_text');

copiedBtn?.addEventListener('click', function () {
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(window.location.href).then(function () {
            copiedTxt.style.display = "block";
            setTimeout(() => copiedTxt.style.display = 'none', 800);
        });
    } else {
        // Fallback for older browsers
        const textArea = document.createElement("textarea");
        textArea.value = window.location.href;
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        document.execCommand('copy');
        copiedTxt.style.display = "block";
        setTimeout(() => copiedTxt.style.display = 'none', 800);
        document.body.removeChild(textArea);
    }
});


const faqItems = document.querySelectorAll('.faq-item');
const body = document.querySelector('body');
faqItems.forEach(item => {
    const button = item.querySelector('.accordion-title');
    button?.addEventListener('click', function (e) {
        if (item.classList.contains('active')) {
            item.classList.remove('active');
            button.querySelector('.bi').classList.replace('bi-dash', 'bi-plus');
        } else {
            faqItems.forEach(i => {
                i.classList.remove('active');
                i.querySelector('.bi').classList.replace('bi-dash', 'bi-plus');
            });
            item.classList.add('active');
            button.querySelector('.bi').classList.replace('bi-plus', 'bi-dash');
        }
    });
});
body?.addEventListener('click', function (e) {
    if (!e.target.closest('.faq-item')) {
        faqItems.forEach(item => {
            item.classList.remove('active');
            item.querySelector('.bi').classList.replace('bi-dash', 'bi-plus');
        });
    }
});


const useful_info_btn = document.querySelector(".useful_info_btn")
useful_info_btn?.addEventListener("click", () => {
    useful_info_btn.parentElement.classList.toggle("active_info_box")
})

document.querySelector('.mobile_submenu')?.addEventListener('click', function () {
    this.classList.toggle('active');
});

// Takvimi oluşturduğunuz yerde veya hemen öncesinde:
const minYear = 1960;
const maxYear = 2030;

// Yıl dizisini manuel olarak oluşturun
const years = [];
for (let year = minYear; year <= maxYear; year++) {
    years.push(year);
}


const fixed_message = document.querySelector(".fixed_message")
const fixedLinks = document.querySelector(".fixedLinks")

fixed_message?.addEventListener("click", () => {
    fixed_message.classList.toggle("active_fixed_message")
    fixedLinks.classList.toggle("showedFixedLinks")
})
window.addEventListener("load", function () {
    setTimeout(function () {
        document.querySelector(".fixed_text").style.opacity = "1";
    }, 1800);
});