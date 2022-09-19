<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function usuarios(){
        $usuarios = User::all();

        return view('users.usuario', ['usuarios'=>$usuarios]);
    }
}
