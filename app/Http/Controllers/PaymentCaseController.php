<?php

namespace App\Http\Controllers;

use App\PaymentCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentCaseController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $cases = DB::connection('payments')->table('mfpay_PaymentCase')->get();
        return view('payments.index',compact('cases', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('payments.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'PaymentID' => 'required',
            'cost' => 'required',
        ]);

        DB::connection('payments')->table('mfpay_PaymentCase')->insert([
            'title' => $request->title,
            'PaymentID' => $request->PaymentID,
            'cost' => $request->cost,
        ]);

        return redirect(route('paymentsCase.index'));
    }

    public function show(PaymentCase $paymentCase)
    {
        //
    }

    public function edit($id)
    {
        $user = Auth::user();
        $case = DB::connection('payments')->table('mfpay_PaymentCase')->find($id);
        return view('payments.edit',compact('case', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'PaymentID' => 'required',
            'cost' => 'required',
        ]);

        DB::connection('payments')->table('mfpay_PaymentCase')
            ->where('id', $id)
            ->update([
            'title' => $request->title,
            'PaymentID' => $request->PaymentID,
            'cost' => $request->cost,
        ]);

        return redirect(route('paymentsCase.index'));
    }

    public function destroy($id)
    {
        DB::connection('payments')->table('mfpay_PaymentCase')
            ->where('id', $id)->delete();

        return redirect(route('paymentsCase.index'));
    }
}
