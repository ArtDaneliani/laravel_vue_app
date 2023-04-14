<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index() {
        return view('home');
    }
    public function home() {
        return view('home');
    }

}
/* уже ненужен этот контроллер
работает встроенный HomeController */
