<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Alert;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        // Your custom logic before the login process (if needed)
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = Auth::user();
            $password_updated = $user->password_updated;

            $date1 = Carbon::parse($password_updated);
            $date2 = Carbon::parse(date('Y').'-'.date('m').'-'.date('d'));

            // Calculate the difference in days
            $daysDifference = $date1->diffInDays($date2);

            // Check if the difference is over 90 days
            if ($daysDifference > 90) {
                // The difference is over 90 days
                $alert = new Alert;
                $alert->user_id = $user->id;
                $alert->alert_short = 'Security action required';
                $alert->alert_long = 'You need to update your password because you are using it over 90 days.';
                $alert->save();
            }
            return $this->sendLoginResponse($request);
        }
        // Your custom logic after a failed login attempt (if needed)

        return $this->sendFailedLoginResponse($request);
    }
}