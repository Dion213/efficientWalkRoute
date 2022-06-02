<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('shopping_list_id');
            $table->timestamps();
        });

        Schema::create('article_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('article_id');
            $table->integer('amount');
            $table->timestamps();
        });
    }
};
