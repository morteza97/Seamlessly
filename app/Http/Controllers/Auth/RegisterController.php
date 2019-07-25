<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Keygen\Keygen;
use SoapClient;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
            'NationalCode' => ['required', 'string', 'max:10', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $key = Keygen::numeric(4)->generate();

        $api = new SoapClient('http://www.tsms.ir/soapWSDL/?wsdl');

        $username = 'maaref_ac';
        $password = '12345678';
        $mobile_array = array($data['mobile']);//حداکثر 100 شماره موبایل
        $msg_array = array("کد تایید شما: ".$key);
        $sms_number_array = array('3000101166');
        $messagid = rand();
        $mclass = array('');

        $rezult = $api->sendSms($username, $password, $sms_number_array, $mobile_array, $msg_array, $mclass, $messagid);

        return User::create([
            'FirstName' => $data['FirstName'],
            'LastName' => $data['LastName'],
            'NationalCode' => $data['NationalCode'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'code' => $key,
            'password' => Hash::make($data['password']),
        ]);
    }
}
