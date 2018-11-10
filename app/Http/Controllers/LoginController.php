<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function verify(LoginRequest $request)
    {
//        $user = DB::table('users')
        $user = DB::table('users')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if(!$user)
        {
            $request->session()->flash('message', 'Invalid Username or Password');
            return redirect()->route('login');
        }
        else
        {
            $request->session()->put('user', $user);
            return redirect()->route('project');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

}
