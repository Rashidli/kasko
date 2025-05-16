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
        Schema::create('contact_social_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_social_id');
            $table->string('locale')->index();
            $table->string('title')->nullable();

            $table->unique(['contact_social_id', 'locale']);
            $table->foreign('contact_social_id')->references('id')->on('contact_socials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_social_translations');
    }
};
