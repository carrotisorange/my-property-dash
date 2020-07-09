<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;
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
    //protected $redirectTo = RouteServiceProvider::HOME;
    // protected function authenticated(Request $request, $user)
    // { 
    //     if($user->status === 'unregistered'){
    //         return view('unregistered');
    //     }else{
    //         return redirect('/');
    //     }
    // }

        function authenticated(Request $request, $user)
        {
            DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                        'last_login_at' => Carbon::now(),
                        'last_login_ip' => $request->getClientIp(),
                        'user_current_status' => 'online',
                    ]);
        }

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function logout(Request $request) {
      
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                            'last_logout_at' => Carbon::now(),
                            'user_current_status' => 'offline',
                        ]);

        Auth::logout();
        return redirect('/login');
      }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
