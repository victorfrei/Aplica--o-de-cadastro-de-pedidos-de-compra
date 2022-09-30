<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\FlareClient\Http\Client;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->namespace('NumeroPedido');
            $table->dateTime(column: 'DtPedido');
            $table->smallInteger(column: 'Quantidade');
            $table->foreignId(column:'Customer_id')->constrained()->onDelete(action:'cascade');
            $table->foreignId(column:'Product_id')->constrained()->onDelete(action:'cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
