<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Socialite;
use Illuminate\Http\Request;
use App\User;


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

     protected $redirectTo = '/property/all';


    //     function authenticated(Request $request, $user)
    //     {
    //        if(Auth::user()->email !== 'thepropertymanager2020@gmail.com' ){
    //         DB::table('users')
    //         ->where('id', Auth::user()->id)
    //         ->update(
    //                     [
    //                         'last_login_at' => Carbon::now(),
    //                         'last_login_ip' => request()->ip(),
    //                         'user_current_status' => 'online',
    //                     ]
    //             );

    //         DB::table('sessions')
    //         ->insert(
    //                     [
    //                         'session_user_id' => Auth::user()->id,
    //                         'session_last_login_at' => Carbon::now(),
    //                         'session_last_login_ip' => request()->ip(),
    //                     ]
    //                 );
    //        }
    //     }

    
    // protected $redirectTo = '/board';

    // protected function redirectTo()
    // {
    //     if(Auth::user()->user_type =='root'){
    //         return '/users';
    //     }else{
    //         return '/board';
    //     }   
    // }

    /**
     * Create a new controller instance.
     *
     * 
     */

    public function logout(Request $request) {
      
        if(Auth::user()->email !== 'thepropertymanager2020@gmail.com' ){
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(
                            [
                                'last_logout_at' => Carbon::now(),
                                'user_current_status' => 'offline',
                            ]
                    );
            
            DB::table('sessions')
                ->insert(
                            [   
        
                                'session_user_id' => Auth::user()->id,
                                'session_last_logout_at' => Carbon::now(),
                                'session_last_login_ip' => request()->ip(),
                            ]
                        );
        }
        Auth::logout();
        return redirect('/login');
      }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        dd($user);

        // $user->token;
    }

}
