<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneVerifyController extends Controller
{
    use AuthenticatesUsers;

    public function verify(){
        return view('verify');
    }

    public function verifySubmit(Request $request){

        if( $user = User::where('code', $request->code)->first() ){
            $user->active = 1;
            $user->code = null;
            $user->save();
            //return redirect()->route('login')->withMessage('Your account is active');
            return redirect(route('dashboard'));
            //return $this->sendLoginResponse($request);
        }
        else
            return back()->withMessage('کد تایید نادرست می باشد لطفا دوباره سعی کنید.');
    }
}
