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
        Schema::create('announcement_images', function (Blueprint $table) {
            $table->id('image_id');
            $table->string('file_name');
            $table->bigInteger('created_by');
            $table->bigInteger('announcement_id')->unsigned()->index('announcement_id');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->foreign('announcement_id')->references('announcement_id')->on('announcements')->onDelete('cascade');
            ;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('announcement_images');

    }
};
