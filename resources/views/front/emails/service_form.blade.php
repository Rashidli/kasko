{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <link rel="stylesheet" href="{{asset('/')}}front/style/style.css?v={{time()}}">--}}
{{--    <style>--}}

{{--        .email-template {--}}
{{--            width: 100%;--}}
{{--            background: #fff;--}}
{{--        }--}}
{{--        .email-template .email-template-container {--}}
{{--            width: auto;--}}
{{--            margin: 48px auto 0;--}}
{{--            background: #F5F5F5;--}}
{{--            border-radius: 20px;--}}
{{--            padding: 36px;--}}
{{--        }--}}
{{--        .email-template .email-template-container .email-template-head {--}}
{{--            width: auto;--}}
{{--            padding: 16px;--}}
{{--            background: #0A2056;--}}
{{--            border-radius: 20px;--}}
{{--        }--}}
{{--        .email-template .email-template-container .email-template-head h1 {--}}
{{--            font-size: 32px;--}}
{{--            font-weight: 600;--}}
{{--            line-height: 36px;--}}
{{--            text-align: center;--}}
{{--            color: #fff;--}}
{{--        }--}}
{{--        .email-template .email-template-container .template-table {--}}
{{--            margin-top: 12px;--}}
{{--            background: #FFFFFF;--}}
{{--            border-radius: 20px;--}}
{{--            padding: 20px;--}}
{{--        }--}}
{{--        .email-template .email-template-container .template-table .template-header {--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            padding: 22px 28px;--}}
{{--            background: #EFF5F9;--}}
{{--            border-radius: 20px;--}}
{{--            width: auto;--}}
{{--        }--}}
{{--        .email-template .email-template-container .template-table .template-header .template-header-name {--}}
{{--            font-size: 20px;--}}
{{--            font-weight: 600;--}}
{{--            line-height: 36px;--}}
{{--            color: #0A2056;--}}
{{--            width: 50%;--}}
{{--        }--}}
{{--        .email-template .email-template-container .template-table .template-rows {--}}
{{--            width: auto;--}}
{{--            padding: 0 28px;--}}
{{--        }--}}
{{--        .email-template .email-template-container .template-table .template-rows .template-row {--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            width: auto;--}}
{{--            padding: 12px 0;--}}
{{--            border-bottom: 1px solid rgba(0, 0, 0, 0.08);--}}
{{--        }--}}
{{--        .email-template .email-template-container .template-table .template-rows .template-row .template-cell {--}}
{{--            font-size: 16px;--}}
{{--            font-weight: 400;--}}
{{--            width: 50%;--}}
{{--            line-height: 36px;--}}
{{--            text-align: left;--}}
{{--            color: rgba(0, 0, 0, 0.9);--}}
{{--        }--}}
{{--        .email-template .email-template-container .template-table .template-rows .template-row:last-child {--}}
{{--            padding-bottom: 0;--}}
{{--            border-bottom: none;--}}
{{--        }--}}
{{--        @media only screen and (max-width: 1260px) {--}}
{{--            .email-template .email-template-container {--}}
{{--                margin: 40px auto 0;--}}
{{--                padding: 24px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .email-template-head {--}}
{{--                padding: 14px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .email-template-head h1 {--}}
{{--                font-size: 24px;--}}
{{--                line-height: 32px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table {--}}
{{--                padding: 18px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-header {--}}
{{--                padding: 18px 24px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-header .template-header-name {--}}
{{--                font-size: 18px;--}}
{{--                line-height: 28px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-rows {--}}
{{--                padding: 0 24px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-rows .template-row {--}}
{{--                padding: 10px 0;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-rows .template-row .template-cell {--}}
{{--                font-size: 16px;--}}
{{--                line-height: 28px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-rows .template-row:last-child {--}}
{{--                padding-bottom: 0;--}}
{{--                border-bottom: none;--}}
{{--            }--}}
{{--        }--}}
{{--        @media only screen and (max-width: 768px) {--}}
{{--            .email-template .email-template-container {--}}
{{--                margin: 30px auto 0;--}}
{{--                border-radius: 16px;--}}
{{--                padding: 16px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .email-template-head {--}}
{{--                padding: 10px;--}}
{{--                border-radius: 16px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .email-template-head h1 {--}}
{{--                font-size: 20px;--}}
{{--                line-height: 32px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table {--}}
{{--                margin-top: 10px;--}}
{{--                border-radius: 16px;--}}
{{--                padding: 16px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-header {--}}
{{--                padding: 12px 16px;--}}
{{--                border-radius: 16px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-header .template-header-name {--}}
{{--                font-size: 16px;--}}
{{--                line-height: 24px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-rows {--}}
{{--                padding: 0 16px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-rows .template-row {--}}
{{--                width: auto;--}}
{{--                padding: 10px 0;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-rows .template-row .template-cell {--}}
{{--                font-size: 13px;--}}
{{--                line-height: 18px;--}}
{{--            }--}}
{{--            .email-template .email-template-container .template-table .template-rows .template-row:last-child {--}}
{{--                padding-bottom: 0;--}}
{{--                border-bottom: none;--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}
{{--    <title>Kasko Insurance Order</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="email-template p-lr">--}}
{{--    <div class="email-template-container">--}}
{{--        <div class="email-template-head">--}}
{{--            <h1> {{$data->form?->service?->title}} üzrə yeni sifariş</h1>--}}
{{--        </div>--}}
{{--        <div class="template-table">--}}
{{--            <div class="template-header">--}}
{{--                <div class="template-header-name">Başlıq</div>--}}
{{--                <div class="template-header-name">Sifariş məlumatı</div>--}}
{{--            </div>--}}
{{--            <div class="template-rows">--}}
{{--                @php--}}
{{--                    $dataDecoded = json_decode($data->data, true);--}}
{{--                    $prefix = $dataDecoded['prefix'] ?? null;--}}
{{--                    $mobile = $dataDecoded['mobile'] ?? null;--}}
{{--                @endphp--}}

{{--                @foreach($dataDecoded as $key => $value)--}}
{{--                    @if($key === 'prefix' || $key === 'mobile')--}}
{{--                        @continue <!-- Skip prefix and mobile for now -->--}}
{{--                    @endif--}}

{{--                    <div class="template-row">--}}
{{--                        <div class="template-cell">{{ ucfirst(str_replace('_', ' ', $key)) }}</div>--}}
{{--                        <div class="template-cell">{{ is_array($value) ? implode(', ', $value) : $value }}</div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--                @if ($prefix && $mobile)--}}
{{--                    <div class="template-row">--}}
{{--                        <div class="template-cell">Mobil nömrə</div>--}}
{{--                        <div class="template-cell">--}}
{{--                            @php--}}
{{--                                // Remove dashes from the mobile number for proper formatting--}}
{{--                                $formattedMobile = str_replace('-', '', $mobile);--}}
{{--                                // Combine prefix and mobile number--}}
{{--                                $fullNumber = $prefix . $formattedMobile;--}}
{{--                            @endphp--}}
{{--                            <a href="tel:{{ $fullNumber }}">{{ $fullNumber }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasko Insurance Order</title>
</head>
<body style="min-width: 350px; margin: 0; padding: 0; background: #fff; font-family: Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background: #fff; margin: 0; padding: 0;">
    <tr>
        <td>
            <table width="600" cellpadding="0" cellspacing="0" style="margin: 48px auto 0; background: #F5F5F5; border-radius: 20px; padding: 0;">
                <tr>
                    <td style="padding: 36px;">
                        <!-- Header Section -->
                        <table width="100%" cellpadding="0" cellspacing="0" style="background: #0A2056; border-radius: 20px;">
                            <tr>
                                <td style="padding: 12px; text-align: center;">
                                    <h1 style="font-size: 20px; font-weight: bold; line-height: 28px; color: #fff; margin: 0; text-align: center;">
                                        {{$data->form?->service?->title}} üzrə yeni sifariş
                                    </h1>
                                </td>
                            </tr>
                        </table>

                        <!-- Content Section -->
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 12px; background: #FFFFFF; border-radius: 20px; padding: 20px;">
                            <!-- Table Header -->
                            <tr>
                                <td style="padding: 12px 28px; background: #EFF5F9; border-radius: 20px;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="font-size: 16px; font-weight: bold; line-height: 24px; color: #0A2056; width: 50%; padding: 4px 0;">
                                                Başlıq
                                            </td>
                                            <td style="font-size: 16px; font-weight: bold; line-height: 24px; color: #0A2056; width: 50%; padding: 4px 0;">
                                                Sifariş məlumatı
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- Table Content -->
                            <tr>
                                <td style="padding: 0 28px;">
                                    @php
                                        $dataDecoded = json_decode($data->data, true);
                                        $prefix = $dataDecoded['prefix'] ?? null;
                                        $mobile = $dataDecoded['mobile'] ?? null;
                                    @endphp

                                    @foreach($dataDecoded as $key => $value)
                                        @if($key === 'prefix' || $key === 'mobile')
                                            @continue
                                        @endif
                                        <table cellpadding="0" cellspacing="0" style="width:100%;min-width: 400px;  border-bottom: 1px solid rgba(0, 0, 0, 0.08);">
                                            <tr style="width: 100%;">
                                                <td style="font-size: 14px; font-weight: normal; width: 50%; min-width: 250px; line-height: 20px; padding: 12px 0; color: rgba(0, 0, 0, 0.9);">
                                                    {{ ucfirst(str_replace('_', ' ', $key)) }}
                                                </td>
                                                <td style="font-size: 14px; font-weight: normal; width: 50%;min-width: 250px; line-height: 20px; padding: 12px 0; color: rgba(0, 0, 0, 0.9);">
                                                    {{ is_array($value) ? implode(', ', $value) : $value }}
                                                </td>
                                            </tr>
                                        </table>
                                    @endforeach

                                    @if ($prefix && $mobile)
                                        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 8px;">
                                            <tr>
                                                <td style="font-size: 14px; font-weight: normal; width: 50%; line-height: 20px; padding: 12px 0; color: rgba(0, 0, 0, 0.9);">
                                                    Mobil nömrə
                                                </td>
                                                <td style="font-size: 14px; font-weight: normal; width: 50%; line-height: 20px; padding: 12px 0; color: rgba(0, 0, 0, 0.9);">
                                                    @php
                                                        $formattedMobile = str_replace('-', '', $mobile);
                                                        $fullNumber = $prefix . $formattedMobile;
                                                    @endphp
                                                    <a href="tel:{{ $fullNumber }}" style="color: #0A2056; text-decoration: none;">{{ $fullNumber }}</a>
                                                </td>
                                            </tr>
                                        </table>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>

