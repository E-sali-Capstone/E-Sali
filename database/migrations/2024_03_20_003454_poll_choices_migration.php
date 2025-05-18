<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('poll_choices', function (Blueprint $table) {
            $table->id('choice_id');
            $table->string('choice');
            $table->integer('responses');
            $table->bigInteger('question_id')->unsigned()->index('question_id');
            $table->bigInteger('created_by')->unsigned()->index('created_by');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreign('question_id')->references('question_id')->on('poll_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('poll_choices');
    }
};
