<?php

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
        Schema::create('title_evaluation', function (Blueprint $table) {
            $table->id();
            $table->string('evaluator');
            $table->string('groupName');
            $table->string('capstoneTitle');
            $table->string('section');
            $table->string('course');
            $table->float('Q1');
            $table->float('Q2');
            $table->float('Q3');
            $table->float('Q4');
            $table->float('Q5');
            $table->float('numerical');
            $table->string('equivalent');
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
        Schema::dropIfExists('title_evaluation');
    }
};
