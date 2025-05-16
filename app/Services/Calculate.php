<?php

namespace App\Services;

class Calculate
{
    public function calculate_kasko(bool $teminat,int $bazar_deyeri, int $azad_olma_meblegi): string
    {
        $result = 0;
        if($teminat){
            if($azad_olma_meblegi == 100){
                $result = $bazar_deyeri * 0.029;
            }elseif ($azad_olma_meblegi == 250){
                $result = $bazar_deyeri * 0.027;
            }elseif ($azad_olma_meblegi == 500){
                $result = $bazar_deyeri * 0.026;
            }elseif ($azad_olma_meblegi == 800){
                $result = $bazar_deyeri * 0.025;
            }elseif ($azad_olma_meblegi == 1000){
                $result = $bazar_deyeri * 0.023;
            }
        }else{
            if($azad_olma_meblegi == 100){
                $result = $bazar_deyeri * 0.027;
            }elseif ($azad_olma_meblegi == 250){
                $result = $bazar_deyeri * 0.026;
            }elseif ($azad_olma_meblegi == 500){
                $result = $bazar_deyeri * 0.025;
            }elseif ($azad_olma_meblegi == 800){
                $result = $bazar_deyeri * 0.024;
            }elseif ($azad_olma_meblegi == 1000){
                $result = $bazar_deyeri * 0.022;
            }
        }
        if($result < 450){
            return 450;
        }
        return $result;
    }
}
