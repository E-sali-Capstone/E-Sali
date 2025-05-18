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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id('announcement_id');
            $table->text('title');
            $table->string('content');
            $table->date('valid_from');
            $table->date('valid_to');
            $table->text('announcement_status');
            $table->bigInteger('created_by')->unsigned()->index('created_by');
            $table->bigInteger('program_id')->unsigned()->index('program_id');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreign('program_id')->references('program_id')->on('programs_courses');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('announcements');
    }
};
