<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('insurance_id');
            $table->string('registryNumber');
            $table->string('registrationNumber');
            $table->string('propertyType');
            $table->decimal('propertyArea', 10, 2);
            $table->string('propertyUsageType');
            $table->json('propertyAddress');
            $table->timestamps();

            $table->foreign('insurance_id')->references('id')->on('insurances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
