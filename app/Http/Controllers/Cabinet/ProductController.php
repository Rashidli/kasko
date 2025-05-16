<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function propertyInsurance()
    {
        return view('cabinet.products.property-insurance');
    }

    public function getIframeUrl(Request $request)
    {
        $data = $request->validate([
            'effectiveFromDate'  => 'required',
            'registrationNumber' => 'required',
            'registryNumber'     => 'required',
            'propertyUsageType'  => 'required',
            'idDocument'         => 'required',
            'insuredIdNumber'    => 'required',
            'insuredPhoneNumber' => 'required',
            'insuredEmail'       => 'required',
            'juridicalType'      => 'required',
            'entityType'         => 'required',
        ]);

        $data1 = [
            'voenInsurer'        => '1400837161',
            'effectiveFromDate'  => Carbon::parse($data['effectiveFromDate'])->format('d.m.Y H:i'),
            'registrationNumber' => $data['registrationNumber'],
            'registryNumber'     => $data['registryNumber'],
            'propertyUsageType'  => $data['propertyUsageType'],
            'idDocument'         => $data['idDocument'],
            'insuredIdNumber'    => $data['insuredIdNumber'],
            'insuredPhoneNumber' => $data['insuredPhoneNumber'],
            'insuredEmail'       => $data['insuredEmail'],
            'juridicalType'      => 0,
            'entityType'         => 'physical',
            'Beneficiary'        => [],
        ];

        $base64Data = base64_encode(json_encode($data1));

        $payload = [
            'compId'        => 'isb',
            'requestNumber' => now()->format('YmdHisv'),
            'base64Data'    => $base64Data,
            'operationType' => 'AppPropertyDEIS',
        ];

        $token    = config('isb.isb_token');
        $api      = config('isb.isb_api');
        $response = Http::withHeaders([
            'Accept'       => 'application/json',
            'Content-Type' => 'application/json',
            'api-token'    => $token,
        ])->post($api . '/getDeisiFrameUrlWithPayload', $payload);

        if ($response->successful()) {
            return response()->json([
                'iframe_url' => $response->json()['url'] ?? null,
            ]);
        }
    }
}
