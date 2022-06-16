<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id');
            $table->string('name');
            $table->string('description');
            $table->enum('type', [
                'min_amount',
                'weekdays',
                'not_available_period',
            ]);
            $table->text('options');
            $table->timestamps();
        });
    }
};
