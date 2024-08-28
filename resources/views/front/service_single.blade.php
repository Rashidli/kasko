@extends('front.layouts.master')

@section('title', $service->seo_title)
@section('description', $service->seo_description)
@section('keywords', $service->seo_keywords)
<script src="https://jsuites.net/v5/jsuites.js"></script>
@section('content')

    <div class="page-direction p-lr">
        <a href="{{route('welcome')}}" class="prev-page">
           {{$home_page->title}}
        </a>
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_171_1378)">
                <path d="M4.1665 10H15.8332" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.5 13.3333L15.8333 10" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12.5 6.66666L15.8333 9.99999" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
                <clipPath id="clip0_171_1378">
                    <rect width="20" height="20" fill="white"/>
                </clipPath>
            </defs>
        </svg>
        <a href="javascript: void(0)" class="current-page">
            {{$service->title}}
        </a>
    </div>
    <div class="insurance-hero-container p-lr">
        <div class="insurance-hero">
            <div class="head-txt">
                <h1>{{$service->title}}</h1>
            </div>
            <span class="gradient"></span>
            <img src="{{asset('storage/' . $service->image)}}" alt="" class="insurance-hero-img">

        </div>
    </div>
    <div class="insurance-contents p-lr">
        <div class="insurance-content-item">
            <h2>{{$service->title}}</h2>
            <div class="content-texts">
                <p>
                    {!! $service->description !!}
                </p>
            </div>
            <form action="{{ route('forms.submit') }}" method="post" class="service_single_form">
                @csrf
                <h3>{{ $words['apply_form']->translate(app()->getLocale())->title }}</h3>
                <div class="form-main">
                    <div class="form-inner">
                        @foreach($service->form->formFields as $field)
                            <input type="hidden" name="field_ids[]" value="{{ $field->id }}">

                            @if($field->type === 'text')
                                @if($field->name === 'fin_code')
                                    <div class="form-item">
                                        <input  type="text" minlength="7" maxlength="7" oninput="this.value = this.value.toUpperCase()" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" class="@error($field->name) is-invalid @enderror">
                                        <label for="">{{ $field->label }}</label>
                                        <!-- @error($field->name)
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror -->
                                        <div class="error-message">Doldur</div>
                                    </div>
                                @elseif($field->name === 'mobile')
                                    <div class="form-item">
                                        <div class="phone-input">
                                            <select  name="prefix">
                                                <option value="050">050</option>
                                                <option value="051">051</option>
                                                <option value="055">055</option>
                                                <option value="070">070</option>
                                                <option value="077">077</option>
                                                <option value="010">010</option>
                                                <option value="099">099</option>
                                            </select>
                                            <input data-mask='000-00-00' type="text" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" class="@error($field->name) is-invalid @enderror">
                                        </div>
                                        <label for="">{{ $field->label }}</label>
                                        <!-- @error($field->name)
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror -->
                                        <div class="error-message">Doldur</div>
                                    </div>
                                @elseif ($field->name === 'dovlet_qeydiyyat_nisani')
                                    <div class="form-item">
                                        <input  oninput="this.value = this.value.toUpperCase()" data-mask='00-AA-000' type="text" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" class="@error($field->name) is-invalid @enderror">
                                        <label for="">{{ $field->label }}</label>
                                        <!-- @error($field->name)
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror -->
                                        <div class="error-message">Doldur</div>
                                    </div>
                                @else
                                    <div class="form-item">
                                        <input  type="text" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" class="@error($field->name) is-invalid @enderror">
                                        <label for="">{{ $field->label }}</label>
                                        <!-- @error($field->name)
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror -->
                                        <div class="error-message">Doldur</div>

                                    </div>
                                @endif

                            @elseif($field->type === 'email')
                                <div class="form-item">
                                    <input  type="email" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" class="@error($field->name) is-invalid @enderror">
                                    <label for="">{{ $field->translate(app()->getLocale())->example }}</label>
                                    <!-- @error($field->name)
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror -->
                                    <div class="error-message">Doldur</div>

                                </div>
                            @elseif($field->type === 'select')
                                <div class="form-item">
                                    <select name="{{ $field->name }}" id="" class="@error($field->name) is-invalid @enderror">
                                        @php
                                            $options = explode(',', $field->options);
                                        @endphp
                                        <option disabled>{{ $field->placeholder }}</option>
                                        @foreach($options as $option)
                                            <option value="{{ trim($option) }}" {{ old($field->name) == trim($option) ? 'selected' : '' }}>{{ trim($option) }}</option>
                                        @endforeach
                                    </select>
                                    <label for="">{{ $field->label }}</label>
                                    <!-- @error($field->name)
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror -->
                                    <div class="error-message">Doldur</div>
                                </div>
                            @elseif($field->type === 'number')
                                <div class="form-item">
                                    <input  type="number" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" min="0" class="@error($field->name) is-invalid @enderror">
                                    <label for="">{{ $field->label }}</label>
                                    <!-- @error($field->name)
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror -->
                                    <div class="error-message">Doldur</div>

                                </div>
                            @elseif($field->type === 'date')
                                <div class="form-item">
                                    <input  type="date" name="{{ $field->name }}" placeholder="{{ $field->placeholder }}" value="{{ old($field->name) }}" min="0" class="@error($field->name) is-invalid @enderror">
                                    <label for="">{{ $field->label }}</label>
                                    <!-- @error($field->name)
                                    <div class="error-message">{{ $message }}</div>
                                    @enderror -->
                                    <div class="error-message">Doldur</div>

                                </div>
                            @endif
                        @endforeach
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
