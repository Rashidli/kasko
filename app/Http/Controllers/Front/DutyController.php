<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DutyController extends Controller
{
    /**
     * @throws ConnectionException
     */
    public function getData(Request $request)
    {
        $request->validate([
            'autoType' => 'required|string',
            'commerceType' => 'required|string',
            'engine' => 'required|integer|between:0,999999',
            'engineType' => 'required|string',
            'issueDate' => 'required',
            'price' => 'required|numeric|between:0,999999999',
            'otherExpenses' => 'nullable|numeric|between:0,999999999',
            'transportExpenses' => 'nullable|numeric|between:0,999999999',
        ]);

        $url = 'https://c2b-fbusiness.customs.gov.az/api/v1/dictionaries/calAutoDuty';

        $issueDate = Carbon::parse($request->issueDate)->format('d.m.Y');
        $postData = [
            'autoType' => $request->autoType,
            'commerceType' => $request->commerceType,
            'engine' => $request->engine,
            'engineType' => $request->engineType,
            'issueDate' => $issueDate,
            'price' => $request->price,
            'otherExpenses' => $request->otherExpenses ?? 0,
            'transportExpenses' => $request->transportExpenses ?? 0,
            'lang' => app()->getLocale() ?? 'az',
        ];

        $headers = [
            'lang' => app()->getLocale() ?? 'az',
        ];

        $response = Http::withHeaders($headers)->post($url, $postData);

        $resultData = $response->json();

        return response()->json([
            'data' => $resultData['data']['autoDuty']['duties'],
            'total' => $resultData['data']['autoDuty']['total']['value'],
        ]);
    }


    public function calculate_icbari(Request $request)
    {

        $filePath = storage_path('app/public/test.xlsx');

        $spreadsheet = IOFactory::load($filePath);

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('C3', $request->C3);
        $sheet->setCellValue('C4', $request->C4);
        $sheet->setCellValue('C5', $request->C5);
        $sheet->setCellValue('C6', $request->C6);
        $sheet->setCellValue('C7', $request->C7);
        $sheet->setCellValue('C8', $request->C8);
        $sheet->setCellValue('C9', $request->C9);
        $sheet->setCellValue('C10', $request->C10);
        $sheet->setCellValue('C11', $request->C11);
        $sheet->setCellValue('C12', $request->C12);
        $sheet->setCellValue('C13', $request->C13);

        $spreadsheet->getCalculationEngine()->calculate();

        $calculatedValue = $sheet->getCell('C24')->getCalculatedValue();

        if ($calculatedValue == '#N/A') {
            return response()->json([
                'error' => 'Formula səhv verir, #N/A dəyəri alınır.'
            ]);
        }

        return response()->json([
            'result' => number_format((float)$calculatedValue, 2, '.', '')
        ]);

    }

    private function getExperienceCoefficient($age, $experience)
    {

        $age_experience_coefficients = [
            "16-25" => ["0" => 1.35, "1" => 1.35, "2" => 1.35, "3-4" => 1.30, "5-6" => 1.25, "7-10" => 1.20, "10+" => "-"],
            "26-29" => ["0" => 1.35, "1" => 1.35, "2" => 1.30, "3-4" => 1.25, "5-6" => 1.20, "7-10" => 1.10, "10+" => 1.00],
            "30-39" => ["0" => 1.35, "1" => 1.30, "2" => 1.25, "3-4" => 1.20, "5-6" => 1.10, "7-10" => 1.00, "10+" => 1.00],
            "40-49" => ["0" => 1.35, "1" => 1.30, "2" => 1.25, "3-4" => 1.15, "5-6" => 1.10, "7-10" => 1.00, "10+" => 1.00],
            "50-65" => ["0" => 1.35, "1" => 1.30, "2" => 1.25, "3-4" => 1.15, "5-6" => 1.05, "7-10" => 1.00, "10+" => 1.00],
            "65+" => ["0" => 1.35, "1" => 1.35, "2" => 1.35, "3-4" => 1.30, "5-6" => 1.25, "7-10" => 1.20, "10+" => 1.10],
        ];

        if (isset($age_experience_coefficients[$age])) {
            $age_group = $age_experience_coefficients[$age];

            if (isset($age_group[$experience])) {
                return $age_group[$experience];
            }
        }

        return null;

    }


    function calculateValue($C11, $C12, $C13)
    {

        $sheet2 = [
            ["BM" => 22, "Əmsal" => 0.6, 0 => 22, 1 => 17, 2 => 13, 3 => 9, "4 və daha çox" => 5],
            ["BM" => 21, "Əmsal" => 0.65, 0 => 22, 1 => 16, 2 => 12, 3 => 8, "4 və daha çox" => 4],
            ["BM" => 20, "Əmsal" => 0.7, 0 => 21, 1 => 15, 2 => 11, 3 => 7, "4 və daha çox" => 3],
            ["BM" => 19, "Əmsal" => 0.75, 0 => 20, 1 => 14, 2 => 10, 3 => 6, "4 və daha çox" => 2],
            ["BM" => 18, "Əmsal" => 0.8, 0 => 19, 1 => 13, 2 => 9, 3 => 5, "4 və daha çox" => 1],
            ["BM" => 17, "Əmsal" => 0.85, 0 => 18, 1 => 12, 2 => 8, 3 => 4, "4 və daha çox" => 1],
            ["BM" => 16, "Əmsal" => 0.9, 0 => 17, 1 => 11, 2 => 7, 3 => 3, "4 və daha çox" => 1],
            ["BM" => 15, "Əmsal" => 0.95, 0 => 16, 1 => 11, 2 => 7, 3 => 3, "4 və daha çox" => 1],
            ["BM" => 14, "Əmsal" => 1.0, 0 => 15, 1 => 10, 2 => 6, 3 => 2, "4 və daha çox" => 1],
            ["BM" => 13, "Əmsal" => 1.1, 0 => 14, 1 => 9, 2 => 5, 3 => 2, "4 və daha çox" => 1],
            ["BM" => 12, "Əmsal" => 1.2, 0 => 13, 1 => 8, 2 => 4, 3 => 2, "4 və daha çox" => 1],
            ["BM" => 11, "Əmsal" => 1.3, 0 => 12, 1 => 7, 2 => 3, 3 => 2, "4 və daha çox" => 1],
            ["BM" => 10, "Əmsal" => 1.4, 0 => 11, 1 => 6, 2 => 2, 3 => 1, "4 və daha çox" => 1],
            ["BM" => 9, "Əmsal" => 1.5, 0 => 10, 1 => 5, 2 => 2, 3 => 1, "4 və daha çox" => 1],
            ["BM" => 8, "Əmsal" => 1.6, 0 => 9, 1 => 4, 2 => 2, 3 => 1, "4 və daha çox" => 1],
            ["BM" => 7, "Əmsal" => 1.8, 0 => 8, 1 => 3, 2 => 1, 3 => 1, "4 və daha çox" => 1],
            ["BM" => 6, "Əmsal" => 2.0, 0 => 7, 1 => 2, 2 => 1, 3 => 1, "4 və daha çox" => 1],
            ["BM" => 5, "Əmsal" => 2.2, 0 => 6, 1 => 1, 2 => 1, 3 => 1, "4 və daha çox" => 1],
            ["BM" => 4, "Əmsal" => 2.4, 0 => 5, 1 => 1, 2 => 1, 3 => 1, "4 və daha çox" => 1],
            ["BM" => 3, "Əmsal" => 2.6, 0 => 4, 1 => 1, 2 => 1, 3 => 1, "4 və daha çox" => 1],
            ["BM" => 2, "Əmsal" => 2.8, 0 => 3, 1 => 1, 2 => 1, 3 => 1, "4 və daha çox" => 1],
            ["BM" => 1, "Əmsal" => 3.0, 0 => 2, 1 => 1, 2 => 1, 3 => 1, "4 və daha çox" => 1],
        ];

        $matchedRow = null;

        foreach ($sheet2 as $row) {
            if ($row["BM"] == $C11) {
                $matchedRow = $row;
                break;
            }
        }

        if (!$matchedRow) {
            return 0;
        }

        if (array_key_exists($C12, $matchedRow)) {
            return $matchedRow[$C12];
        }

        return 0;
    }

    function calculateValueWithCondition($C11, $C12, $C13)
    {

        $value = $this->calculateValue($C11, $C12, $C13);

        if ($C12 > 0 && in_array($C13, ["275 gündən az", "275 gündən çox"])) {

            return $value;
        } elseif ($C12 < 1) {
            if ($C13 == "275 gündən az") {
                return $C11;
            } elseif ($C13 == "275 gündən çox") {
                return $value;
            }
        }

        return 0;
    }


}
