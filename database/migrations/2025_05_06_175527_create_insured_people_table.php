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
        Schema::create('insured_people', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('insurance_id');
            $table->string('fullName');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('patronymic');
            $table->string('idDocument');
            $table->string('pin');
            $table->string('phone');
            $table->string('address');
            $table->boolean('isLegal');
            $table->boolean('isTsa');
            $table->string('birthPlace');
            $table->timestamp('birthDate');
            $table->timestamps();

            $table->foreign('insurance_id')->references('id')->on('insurances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insured_people');
    }
};
