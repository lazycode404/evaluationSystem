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
        Schema::create('oral_evaluation', function (Blueprint $table) {
            $table->id();
            $table->string('evaluator');
            $table->string('groupName');
            $table->string('capstoneTitle');
            $table->string('section');
            $table->string('course');
            $table->string('recommendation')->nullable();
            $table->double('CH1Q2');
            $table->double('CH1Q1');
            $table->double('CH1Q3');
            $table->double('CH1Q5');
            $table->double('CH1Q4');
            $table->double('CH1Q6');
            $table->double('CH1Q7');
            $table->double('CH1Q8');

            $table->double('CH2Q1');
            $table->double('CH2Q2');
            $table->double('CH2Q3');
            $table->double('CH2Q4');
            $table->double('CH2Q5');
            $table->double('CH2Q6');
            $table->double('CH2Q7');
            $table->double('CH2Q8');
            $table->double('CH2Q9');

            $table->double('CH3Q1');
            $table->double('CH3Q2');
            $table->double('CH3Q3');
            $table->double('CH3Q4');
            $table->double('CH3Q5');
            $table->double('CH3Q6');
            $table->double('CH3Q7');
            $table->double('CH3Q8');
            $table->double('CH3Q9');
            $table->double('CH3Q10');
            $table->double('CH3Q11');

            $table->double('overallScore')->nullable();
            $table->double('meanScore',12,2)->nullable();
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
        Schema::dropIfExists('oral_evaluation');
    }
};
