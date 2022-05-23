<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shopping_lists', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('walkroute_id');
            $table->timestamps();
        });

        Schema::create('shopping_list_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_list_id');
            $table->foreignId('order_id');
            $table->timestamps();
        });
    }
};
