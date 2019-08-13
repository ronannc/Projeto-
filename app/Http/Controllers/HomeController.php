<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
//        if(User::isAdmin()){
            return view('home');
//        }else{
//            $cliente = User::cliente()->first();
//
//            if($cliente->configuracao() == null){
//
//                auth()->logout();
//                session()->flash('success', 'Sua conta foi criada com sucesso !!! Aguarde os instrutores entrar em contato para liberar seu acesso');
//
//                return view('welcome');
//            }else {
//
////                return redirect(route('myAcount', ['id' => $cliente['id']]));
//                return redirect(route('myCurrentTraining', ['id' => $cliente['id']]));
//            }
//        }
    }
}
