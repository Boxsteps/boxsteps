<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Validator;
use Socialite;
use App\User;
use App\Role;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Where to redirect users after logout.
     *
     * @var string
     */
    protected $redirectAfterLogout = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', [ 'only' => ['showLoginForm', 'login'] ]);
        $this->middleware('auth', [ 'only' => ['showRegistrationForm', 'register'] ]);
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
            'name' => 'required|max:255',
            'second_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
            'coordinator' => 'required_if:role,3'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'second_name' => $data['second_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['role'],
            'user_id' => (array_key_exists('coordinator', $data) ? $data['coordinator'] : null)
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if (property_exists($this, 'registerView')) {
            return view($this->registerView);
        }

        $roles = Role::all();

        $coordinators = Role::findOrFail( trans('globals.coordinator') )->users;

        $data = array('roles' => $roles, 'coordinators' => $coordinators);

        return view('auth.register', $data);
    }

    /**
     * Redirect the user to the Google+ authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google+.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        if ( $request->input('error') == 'access_denied' )
            return redirect('login')->with('oauth-error', trans('auth.oauth-deny'));

        $oauth = Socialite::driver('google')->user();

        $user = User::where('email', '=', $oauth->email)->first();

        if( empty($user) )
            return redirect('login')->with('oauth-error', trans('auth.oauth-miss'));

        auth()->login($user, true);

        return redirect('dashboard');
    }
}
