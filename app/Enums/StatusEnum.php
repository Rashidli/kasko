<?php

namespace App\Enums;

enum StatusEnum: int
{
    case YENI = 1;
    case ELAGE_SAXLANILDI = 2;
    case MUGAVILE_BAGLANILDI = 3;
    case IMTINA_EDILDI = 4;
    case ƏLAQƏ_ALINMADI = 5;
    case TEKLIF_VERILDI = 6;

    public function label(): string
    {
        return match($this) {
            self::YENI => 'Yeni',
            self::ELAGE_SAXLANILDI => 'Əlaqə saxlanıldı',
            self::MUGAVILE_BAGLANILDI => 'Müqavilə bağlanıldı',
            self::IMTINA_EDILDI => 'İmtina edildi',
            self::ƏLAQƏ_ALINMADI => 'Əlaqə alınmadı',
            self::TEKLIF_VERILDI => 'Təklif verildi',
        };
    }
    public function cssClass(): string
    {
        return match($this) {
            self::YENI => 'btn-primary',
            self::ELAGE_SAXLANILDI => 'btn-warning',
            self::MUGAVILE_BAGLANILDI => 'btn-success',
            self::IMTINA_EDILDI => 'btn-danger',
            self::ƏLAQƏ_ALINMADI => 'btn-secondary',
            self::TEKLIF_VERILDI => 'btn-info',
        };
    }
}
