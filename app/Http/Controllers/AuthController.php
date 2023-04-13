<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class AuthController extends Controller {

    public function getLogin() {

        return view('todo.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('todo.index');
        } else {
            return redirect()->route('user-login')->withErrors(array('ошибка авторизации'));
        }

    }
//    public function postLogin(Request $request) {
//
//        $rules = array('username'=>'required', 'password'=>'required');
//        $validator = Validator::make($request->all(), $rules);
//        if ($validator->fails()) {
//            return Redirect::route('user-login')->withErrors($validator);
//        }
//        //авторизуем юзера по меилу и паролю из инпута
//        $auth = Auth::attempt(array(
//            'email' => $request->input('username'),
//            'password'=> $request->input('password'),
//        ),false);
//
//        if ($auth) {
//            return Redirect::route('user-login')->withErrors(array('ошибка авторизации'));
//        }
//        return Redirect::route('todo');
//
//
//    }

}
