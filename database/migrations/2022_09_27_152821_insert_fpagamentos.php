<?php

use App\Models\Fpagamento;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $fpagamento = new Fpagamento(['fpagamento' => 'Selecione a forma de pagamento']);
        $fpagamento->save();
        $fpagamento2 = new Fpagamento(['fpagamento' => 'Cartão']);
        $fpagamento2->save();
        $fpagamento3 = new Fpagamento(['fpagamento' => 'Cartão - Na hora da entrega']);
        $fpagamento3->save();
        $fpagamento4 = new Fpagamento(['fpagamento' => 'Pix']);
        $fpagamento4->save();
        $fpagamento5 = new Fpagamento(['fpagamento' => 'Dinheiro']);
        $fpagamento5->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
