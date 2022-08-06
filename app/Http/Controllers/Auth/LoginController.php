<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
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
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username() {
        return 'nick';
    }

    /**
     * The user has been authenticated.
     *
     * @return mixed
     */
    protected function authenticated() {
        if (!Auth::user()->active) {
            $name = Auth::user();
            Auth::logout();

            Log::channel('slack')
                ->alert("Uživateľ {$name->name}, ({$name->email}) sa pokúsil prihlásiť do účtu aj napriek tomu, že má deaktivované konto.");

            return to_route('login')->withErrors("Konto {$name->nick} nie je povolené!");
        }
    }
}
