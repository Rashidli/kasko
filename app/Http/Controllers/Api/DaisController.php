<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DaisController extends Controller
{
    public function contractProperty(Request $request)
    {
        Log::channel('api_responses')->info('contractProperty', $request->all());

        try {
            $data = $request->all();

            $insurance = Insurance::create([
                'customer_id'          => 1,
                'period'               => $data['period']                        ?? null,
                'agentTIN'             => $data['agentTIN']                      ?? null,
                'contractNumber'       => $data['contractNumber']                ?? null,
                'insuranceType'        => $data['insuranceType']                 ?? null,
                'creationDate'         => $data['creationDate']                  ?? null,
                'insuranceCompanyName' => $data['insuranceCompanyName']          ?? null,
                'token'                => $data['token']                         ?? null,
                'expiryDate'           => $data['expiryDate']                    ?? null,
                'sumInsured'           => $data['sumInsured']                    ?? null,
                'paymentCode'          => $data['paymentCode']                   ?? null,
                'insurerTIN'           => $data['insurerTIN']                    ?? null,
                'insuranceFee'         => $data['contractPrice']['insuranceFee'] ?? null,
                'deductible'           => $data['deductible']                    ?? null,
                'effectiveDate'        => $data['effectiveDate']                 ?? null,
            ]);

            $insurance->operator()->create([
                'firstName'  => $data['operator']['firstName']  ?? null,
                'lastName'   => $data['operator']['lastName']   ?? null,
                'patronymic' => $data['operator']['patronymic'] ?? null,
                'pinCode'    => $data['operator']['pinCode']    ?? null,
                'fullName'   => $data['operator']['fullName']   ?? null,
            ]);

            $insurance->property()->create([
                'registryNumber'     => $data['property']['registryNumber']     ?? null,
                'registrationNumber' => $data['property']['registrationNumber'] ?? null,
                'propertyType'       => $data['property']['propertyType']       ?? null,
                'propertyArea'       => $data['property']['propertyArea']       ?? null,
                'propertyUsageType'  => $data['property']['propertyUsageType']  ?? null,
                'propertyAddress'    => json_encode($data['property']['propertyAddress']),
            ]);

            $insurance->insuredPerson()->create([
                'firstName'  => $data['insuredPerson']['firstName']  ?? null,
                'lastName'   => $data['insuredPerson']['lastName']   ?? null,
                'patronymic' => $data['insuredPerson']['patronymic'] ?? null,
                'fullName'   => $data['insuredPerson']['fullName']   ?? null,
                'idDocument' => $data['insuredPerson']['idDocument'] ?? null,
                'pin'        => $data['insuredPerson']['pin']        ?? null,
                'phone'      => $data['insuredPerson']['phone']      ?? null,
                'address'    => $data['insuredPerson']['address']    ?? null,
                'isLegal'    => $data['insuredPerson']['isLegal']    ?? null,
                'isTsa'      => $data['insuredPerson']['isTsa']      ?? null,
                'birthPlace' => $data['insuredPerson']['birthPlace'] ?? null,
                'birthDate'  => $data['insuredPerson']['birthDate']  ?? null,
            ]);

            session(['payment' => $insurance->paymentCode]);

            return response()->json(['message' => 'Data saved successfully'], 200);
        } catch (Exception $e) {
            Log::error('contractProperty error: ' . $e->getMessage());

            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function paymentProperty(Request $request)
    {
        Log::channel('api_responses')->info('paymentProperty', $request->all());

        $validated = $request->validate([
            'contractNumber' => 'required',
            'amount'         => 'required',
            'paymentDate'    => 'required',
            'paymentSource'  => 'nullable|string',
        ]);

        $insurance = Insurance::query()
            ->where('contractNumber', $validated['contractNumber'])
            ->first();

        $insurance->amount         = $validated['amount'];
        $insurance->payment_date   = Carbon::parse($validated['paymentDate']);
        $insurance->payment_source = $validated['paymentSource'] ?? null;
        $insurance->save();

        return response()->json(['message' => 'payment-property received'], 200);
    }

    public function terminateProperty(Request $request)
    {
        Log::channel('api_responses')->info('terminateProperty', $request->all());

        return response()->json(['message' => 'terminate-property received'], 200);
    }

    public function statusChangeProperty(Request $request)
    {
        Log::channel('api_responses')->info('statusChangeProperty', $request->all());

        $validated = $request->validate([
            'contractNumber' => 'required|string',
            'reason'         => 'required|string',
            'changeDate'     => 'nullable|date',
        ]);

        $insurance         = Insurance::where('contractNumber', $validated['contractNumber'])->first();
        $insurance->status = $validated['reason'];
        $insurance->save();

        return response()->json(['message' => 'status-change-property received'], 200);
    }

    public function testSuccess(Request $request)
    {
        Log::channel('api_responses')->info('successCallbackProperty', $request->all());

        return view('successDeis');
    }

    public function testFail(Request $request)
    {
        Log::channel('api_responses')->info('failureCallbackProperty', $request->all());

        return redirect()->route('fail.property.deis');
    }

    public function successPage()
    {
        return view('cabinet.test_success');
    }

    public function failPage()
    {
        return view('cabinet.test_fail');
    }
}
