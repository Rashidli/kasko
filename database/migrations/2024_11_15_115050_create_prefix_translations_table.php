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
        Schema::create('prefix_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prefix_id');
            $table->string('locale')->index();
            $table->string('prefix');

            $table->unique(['prefix_id', 'locale']);
            $table->foreign('prefix_id')->references('id')->on('prefixes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefix_translations');
    }
};
