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
use App\Session;


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
  

        function authenticated(Request $request, $user)
        {
            $sessions = User::findOrFail(Auth::user()->id)->sessions;

           if($sessions->count() <= 0){
                DB::table('sessions')
                ->insert(
                            [
                                'session_user_id' => Auth::user()->id,
                                'session_last_login_at' => Carbon::now(),
                                'session_last_login_ip' => request()->ip(),
                            ]
                        );
           }else{
            $latest_session = DB::table('sessions')->where('session_user_id',Auth::user()->id )->latest('session_last_login_at')->first();
            
            if($latest_session->session_last_login_at >= Carbon::today()){
                // DB::table('sessions')
                // ->where('session_user_id', Auth::user()->id)
                // ->whereDate('session_last_login_at',  Carbon::today())
                // ->update(
                //             [
                //                 'session_last_login_at' => Carbon::now(),
                //                 'session_last_login_ip' => request()->ip(),
                //             ]
                //         );
                } else{
                        DB::table('sessions')
                        ->insert(
                                    [
                                        'session_user_id' => Auth::user()->id,
                                        'session_last_login_at' => Carbon::now(),
                                        'session_last_login_ip' => request()->ip(),
                                    ]
                                );
                   
                }
           }

        //    $role = Auth::user()->user_type;
        //    if($role === 'tenant'){

        //     return redirect('/user/'.Auth::user()->id.'/portal');
        //   }elseif($role === 'owner'){
        //     return redirect('/user/'.Auth::user()->id.'/portal');
        //   }else{
             
        //   }
           
           }

    /**
     * Create a new controller instance.
     *
     * 
     */

    public function logout(Request $request) {   

        DB::table('sessions')
        ->where('session_user_id', Auth::user()->id)
        ->whereDate('session_last_login_at',  Carbon::today())
            ->update(
                        [   
                            'session_last_logout_at' => Carbon::now(),
                        ]
                    );

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
