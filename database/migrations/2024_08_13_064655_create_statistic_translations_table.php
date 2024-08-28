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
        Schema::create('statistic_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('statistic_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('description');

            $table->unique(['statistic_id', 'locale']);
            $table->foreign('statistic_id')->references('id')->on('statistics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistic_translations');
    }
};
