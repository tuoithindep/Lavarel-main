<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Mime\Email;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Dang nhap he thong'
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->input());

        $this->validate($request, [
            'email' => 'required|email:filter,rfc,dns',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request ->input('email'),
            'password' => $request ->input('password')
        ],$request->input('remember'))){

            return redirect() -> route('admin');
            }

        Session::flash('error', 'Email or Pass ko dung');
        return redirect()->back();
    }
}
