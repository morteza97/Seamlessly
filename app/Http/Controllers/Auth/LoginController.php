<?php

namespace App\Http\Controllers\Auth;

use \Adldap\Laravel\Facades\Adldap;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Keygen\Keygen;
use SoapClient;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
        {

            if (Auth::attempt($request->only(['username', 'password']))) {

                $key = Keygen::numeric(4)->generate();

                $user = $this->guard()->getLastAttempted();

                $user->code = $key;

                $api = new SoapClient('http://www.tsms.ir/soapWSDL/?wsdl');

                $username = 'maaref_ac';
                $password = '12345678';
                $mobile_array = array($user->mobile);//حداکثر 100 شماره موبایل
                $msg_array = array("کد تایید شما: " . $key);
                $sms_number_array = array('3000101166');
                $messagid = rand();
                $mclass = array('');

                $rezult = $api->sendSms($username, $password, $sms_number_array, $mobile_array, $msg_array, $mclass, $messagid);


                if ($user->save()) {
                    return redirect('/verify');
                }
            }

            return redirect()->to('login')
                ->withMessage('اطلاعات ورودی نادرست است لطفا دوباره سعی کنید.');
        }

    public function login2(Request $request)
    {
        $ldap = Adldap::search()->where('samaccountname', '=', $request->username)->get();

        $credentials = $request->only('username', 'password');
        $username = $credentials['username'];
        $password = $credentials['password'];
        echo $username . "--" .$password;
        $user = Adldap::search()->users()->find($username);
        var_dump($user->getConvertedGuid());
        if ($ldap) {
            // User located.

            if (Adldap::auth()->attempt($username, $password, $bindAsUser = false)) {
                // User has passed LDAP authentication.
                return "exist";
                // Create their local account.
                $user = User::firstOrNew(['objectguid' => $ldap->getConvertedGuid()]);

                // Sync user attributes.
                //$user->name = $ldap->getCommonName();
                //$user->email = $ldap->getEmail();

                $user->save();

                Auth::login($user);

                // Logged in!
                return redirect('/');
            }
            return "not attempted";
        }
        // User not found, return validation error.
        return "error";
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        $user->active = 0;
        $user->code = null;
        $user->save();

        Auth::logout();
        return redirect('/login');
    }
}
