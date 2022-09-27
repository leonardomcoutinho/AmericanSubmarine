<?php

use App\Models\Category;
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
        $cat = new Category(['category' => 'Sanduiches']);
        $cat->save();
        $cat2 = new Category(['category' => 'Bebidas']);
        $cat2->save();
        $cat3 = new Category(['category' => 'Adicionais']);
        $cat3->save();
        $cat4 = new Category(['category' => 'Outros']);
        $cat4->save();
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
