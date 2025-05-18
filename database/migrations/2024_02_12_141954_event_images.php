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
        Schema::create('event_images', function (Blueprint $table) {
            $table->id('image_id');
            $table->string('file_name');
            $table->bigInteger('created_by');
            $table->bigInteger('event_id')->unsigned()->index('event_id');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreign('event_id')->references('event_id')->on('events')->onDelete('cascade');
            ;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
