<?php

namespace App\Http\Controllers;

use App\Models\Fpagamento;
use Illuminate\Http\Request;

class FpagamentoController extends Controller
{
    public function fpagamento(){
        $fpagamento = Fpagamento::all();
    
        return view("fpagamento.create", ['fpagamento' => $fpagamento]);
    }
    public function store(Request $request){
        $cat = new Fpagamento();

        $cat->fpagamento = $request->fpagamento;

        $cat->save();

        return redirect()->route('fpagamento')->with('success', 'Forma de pagamento criada com sucesso!');
    }
    public function edit($id){
        $fpagamento = Fpagamento::findOrFail($id);
    
        return view("fpagamento.edit_fpagamento", ['fpagamento' => $fpagamento]);
    }
    public function update(Request $request){

        $fpagamento = Fpagamento::findOrFail($request->id)->update($request->all());     
          

        return redirect()->route('fpagamento')->with('success', 'Forma de pagamento editada com sucesso!');
    }
}
