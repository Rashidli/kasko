@extends('front.layouts.master')

@section('title', $service->meta_title)
@section('description', $service->meta_description)
@section('keywords', $service->meta_keywords)
@section('image', asset('storage/' . $service->image))
@section('schema')
    <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "WebSite",
          "name": "Kasko",
          "url": "https://kasko.az/",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "{{route('dynamic.page', $service->slug)}}{search_term_string}",
            "query-input": "required name=search_term_string"
          }
        }
    </script>

@endsection

@section('content')
{{--    <div class="page-direction p-lr">--}}
{{--        <a href="{{route('welcome')}}" class="prev-page">--}}
{{--           {{$home_page->title}}--}}
{{--        </a>--}}
{{--        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--            <g clip-path="url(#clip0_171_1378)">--}}
{{--                <path d="M4.1665 10H15.8332" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                <path d="M12.5 13.3333L15.8333 10" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                <path d="M12.5 6.66666L15.8333 9.99999" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--            </g>--}}
{{--            <defs>--}}
{{--                <clipPath id="clip0_171_1378">--}}
{{--                    <rect width="20" height="20" fill="white"/>--}}
{{--                </clipPath>--}}
{{--            </defs>--}}
{{--        </svg>--}}
{{--        <a href="javascript: void(0)" class="current-page">--}}
{{--            {{$service->title}}--}}
{{--        </a>--}}
{{--    </div>--}}
    <div class="insurance-hero-container p-lr">
        <div class="insurance-hero">
            <div class="head-txt">
{{--                <h1>{{$service->title}}</h1>--}}
            </div>
            <span class="gradient"></span>
            <img src="{{asset('storage/' . $service->image)}}" alt="{{$service->img_alt}}" title="{{$service->img_title}}" class="insurance-hero-img">

        </div>
    </div>
    <div class="insurance-contents p-lr">
        <div class="insurance-content-item">
            <h1>{{$service->title}}</h1>
            <div class="content-texts">
                {!! $service->description !!}
            </div>
            <form action="{{ route('forms.submit') }}" method="post" id="loginForm" class="service_single_form">
                @csrf
                <h3>{{ $words['apply_form']->translate(app()->getLocale())->title }}</h3>
                <div class="form-main">
                    <div class="form-inner">
                        @foreach($service->form?->formFields ?? [] as $field)
                            <input type="hidden" name="field_ids[]" value="{{ $field->id }}">

                            @if($field->type === 'text')
                                @if($field->name === 'fin_code')
                                    <div class="form-item">
                                        <input required  type="text" minlength="7" maxlength="7" oninput="this.value = this.value.toUpperCase()" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" class="@error($field->name) is-invalid @enderror">
                                        <label for="">{{ $field->label }}</label>
                                        <!-- @error($field->name)
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror -->
                                    </div>
                                @elseif($field->name === 'mobile')
                                    <div class="form-item">
                                        <div class="phone-input">
                                            <select  name="prefix" required>
                                                @foreach($prefixes as $key => $prefix)
                                                    @if($key == 0)
                                                        <option value="">{{ $prefix->prefix }}</option>
                                                        @continue
                                                    @endif
                                                    <option value="{{ $prefix->value }}">{{ $prefix->prefix }}</option>
                                                @endforeach

                                            </select>
                                            <input required data-mask='000-00-00' type="text" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" class="@error($field->name) is-invalid @enderror">
                                        </div>
                                        <label for="">{{ $field->label }}</label>
                                        <!-- @error($field->name)
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror -->


                                    </div>
                                @elseif ($field->name === 'dovlet_qeydiyyat_nisani')
                                    <div class="form-item">
                                        <input required  oninput="this.value = this.value.toUpperCase()" data-mask='00-AA-000' type="text" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" class="@error($field->name) is-invalid @enderror">
                                        <label for="">{{ $field->label }}</label>
                                        <!-- @error($field->name)
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror -->

                                    </div>
                                @else
                                    <div class="form-item">
                                        <input required  type="text" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" class="@error($field->name) is-invalid @enderror">
                                        <label for="">{{ $field->label }}</label>
                                        <!-- @error($field->name)
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror -->


                                    </div>
                                @endif

                            @elseif($field->type === 'email')
                                <div class="form-item">
                                    <input  type="email" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" class="@error($field->name) is-invalid @enderror">
                                    <label for="">{{ $field->label }}</label>
                                    <!-- @error($field->name)
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror -->


                                </div>
                            @elseif($field->type === 'select')
                                <div class="form-item">
                                    <div class="form-item-selects">
                                        <select required name="{{ $field->name }}" id="" class="@error($field->name) is-invalid @enderror">
                                            @php
                                                $options = explode(',', $field->options);
                                            @endphp
                                            <option value="">{{ $field->placeholder }}</option>
                                            @foreach($options as $option)
                                                 <option value="{{ trim($option) }}" {{ old($field->name) == trim($option) ? 'selected' : '' }}>{{ trim($option) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <label for="">{{ $field->label }}</label>
                                    <!-- @error($field->name)
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror -->


                                </div>
                            @elseif($field->type === 'number')
                                <div class="form-item">
                                    <input required  type="number" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" min="0" class="@error($field->name) is-invalid @enderror">
                                    <label for="">{{ $field->label }}</label>
                                    <!-- @error($field->name)
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror -->

                                </div>
                            @elseif($field->type === 'date')
                                <div class="form-item">
                                    <input required
                                    autocomplete="off"
                                           type="text"
                                           name="{{ $field->name }}"
                                           placeholder="{{ $field->placeholder }}"
                                           value="{{ old($field->name) ? \Carbon\Carbon::parse(old($field->name))->format('Y-m-d') : '' }}"
                                           class="@error($field->name) is-invalid @enderror datepicker">
                                           <i class="bi bi-calendar3 calendar-icon"></i>
                                           <label for="">{{ $field->label }}</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="robot form-group mb-3 text-center row mt-3 pt-1">
                        <div class="col-12">
                            <div class="g-recaptcha" data-sitekey="6LdhrpYqAAAAAPlC9H15nBtyyAmpqfxc7aqMvjMg"></div>
                        </div>
                        @if($errors->first('captcha'))
                            <small class="form-text text-danger" style="color: red">{{$errors->first('captcha')}}</small>
                        @endif
                        <small class="form-text text-danger" id="errorMessage" style="color: red; display: none">Please complete the reCAPTCHA challenge to submit the form</small>
                    </div>
                    <button class="send-form" type="submit">{{ $words['order_it']->translate(app()->getLocale())->title }}</button>
                </div>
            </form>

            <div class="notifaction_text">
                <p>
                    {!! $service->short_description !!}
                </p>
            </div>
        </div>
    </div>


@endsection

