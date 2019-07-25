<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentReportsController extends Controller
{
    public function Report() {
        $user = Auth::user();
        $cases = DB::connection('payments')->table('mfpay_PaymentCase')->get();
        $PaymentList = DB::connection('payments')->table('mfpay_paymentsList')
            ->where('RefNo' ,'<>' , 0)->get();
        return view('payments.reports',compact('cases', 'user','PaymentList'));
    }
}
