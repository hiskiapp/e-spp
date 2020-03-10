<?php

namespace App\Http\Controllers\Auth\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{

    use ThrottlesLogins;

    public $maxAttempts = 5;

    public $decayMinutes = 3;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if (auth('admin')->check()) {
            return redirect('admin');
        }

        $data['page_title'] = 'Login Admin';
        $data['login_route'] = 'admin.login';
        $data['username_placeholder'] = 'Username / E-Mail';
        $data['forgot_password_route'] = 'admin.password.request';
        
        return view('auth.login', $data);
    }

    /**
     * Login the admin.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
    	$this->validator($request);

        //check if the user has too many login attempts.
        if ($this->hasTooManyLoginAttempts($request)){
        //Fire the lockout event.
            $this->fireLockoutEvent($request);

        //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }

        if(Auth::guard('admin')->attempt($request->only($this->username(),'password'),$request->filled('remember'))){
        //Authentication passed...
          return redirect('admin')->with([
             'message_type' => 'success',
             'message' => 'Login Successfully!'
         ]);
      }

      //keep track of login attempts from the user.
      $this->incrementLoginAttempts($request);

    	//Authentication failed...
      return $this->loginFailed();
  }

    /**
     * Logout the admin.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
      //logout the admin...
    	Auth::guard('admin')->logout();
    	return redirect()->route('admin.login')->with([
    		'message_type' => 'success',
    		'message' => 'Login Successfully!'
    	]);
    }

    /**
     * Validate the form data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    private function validator(Request $request)
    {
      //validation rules.
    	$rules = [
    		'login'              => 'required|string|min:1|max:255',
    		'password'           => 'required|string|min:4|max:255',
    	];

    //custom validation error messages.
    	$messages = [
            'login.required'     => 'Username or E-Mail cannot be empty',
        ];

    //validate the request.
        $request->validate($rules,$messages);
    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
      //Login failed...
    	return redirect()->back()->withInput()->with([
    		'message_type' => 'warning',
    		'message' => 'Login Failed!'
    	]);
    }

    private function username()
    {
       $login = request()->input('login');
       $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
       request()->merge([$field => $login]);
       return $field;
   }
}
