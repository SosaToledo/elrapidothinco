<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request -> user()->authorizeRoles(['user','admin']);
        return view('home');
    }

    /*
    Dejo funcion de ejemplo de como direccionar a otro sitio cuando el usuario logeado es de tipo admin.
    public function someAdminStuff (Request $request){
        $request->user()->authorizeRoles('admin');
        return view ('some.view');
    } 
    */
}
