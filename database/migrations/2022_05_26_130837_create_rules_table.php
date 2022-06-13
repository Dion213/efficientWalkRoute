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
            $table->string('name');
            $table->string('description');
            $table->enum('type', [
                'min_amount',
                'max_amount',
                'weekdays',
                'not_available_period',
            ]);
            $table->foreignId('article_id');
            $table->integer('min_amount_required')->nullable();
            $table->integer('max_amount_allowed')->nullable();
            $table->enum('weekdays', [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday',
            ])->nullable();
            $table->date('not_available_from')->nullable();
            $table->date('not_available_until')->nullable();
            $table->timestamps();
        });
    }
};
