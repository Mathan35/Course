<?php

namespace App\Http\Controllers;
use Spatie\QueryBuilder\QueryBuilder;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = QueryBuilder::for(User::class)->where('email',$request->email)->first();

        //checking user status
        if($user && $user->status == "0"){
            abort(401);
        }

        //attempt to login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $dateTime             = User::find(auth()->user()->id);
            $dateTime->last_login = Carbon::now()->toDateTimeString();
            $dateTime->save();

            if(auth()->user()->role != "0"){
                return redirect()->intended('admin/admin-dashboard');
            }
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'status' => 'The provided credentials do not match our records.',
        ]);
    }
}