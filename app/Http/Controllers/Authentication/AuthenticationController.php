<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\UsrUserLog;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'guest'
        ];
    }

    public function index(){

        return view ('authentication.login');
    }

    public function authenticationProcess(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

       if (Auth::attempt($request->only('email','password'))) {

        $request->session()->regenerate();

        $insertLogs = new UsrUserLog();
        $insertLogs->user_id = Auth::user()->id;
        $insertLogs->login_date = Carbon::now();
        // $insertLogs->usr_session_id = Auth::user()->id;
        $insertLogs->login_ip = request()->ip();
        $insertLogs->save();

        session()->put('userLogId',$insertLogs->id);

         return redirect()->intended('dashboard');

       }

      return back()->with('login_error_message','email does not exist or wrong password.');
        
    }
}
