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
            $table->string('type');
            $table->foreignId('article_id');
            $table->integer('min_count_required')->nullable();
            $table->integer('max_count_required')->nullable();
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
