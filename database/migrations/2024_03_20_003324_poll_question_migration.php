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
        Schema::create('poll_questions', function (Blueprint $table) {
            $table->id('question_id');
            $table->string('question');
            $table->date('valid_from');
            $table->date('valid_to');
            $table->bigInteger('created_by')->unsigned()->index('created_by');
            $table->bigInteger('program_id')->unsigned()->index('program_id');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('poll_questions');
    }
};
