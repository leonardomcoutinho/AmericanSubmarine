<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function endereco(){       

        return view('profile.address');
    }
    public function edit($id){
        $user = User::findOrFail($id);

        return view('profile.editaddress', ['user'=>$user]);

    }
    public function update(Request $request){
            $request->validate([
                'logradouro'=>'required',
                'cidade'=>'required',
                'estado'=>'required'
            ]);
            User::findOrFail($request->id)->update($request->all());

        return redirect()->route('Home')->with('success', 'Endereço editado com sucesso!');      
        
    }
}
