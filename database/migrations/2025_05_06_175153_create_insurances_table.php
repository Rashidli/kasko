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
        Schema::create('insurances', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('period');
            $table->string('agentTIN');
            $table->string('contractNumber');
            $table->string('insuranceType');
            $table->timestamp('creationDate');
            $table->string('insuranceCompanyName');
            $table->string('token');
            $table->timestamp('expiryDate');
            $table->decimal('sumInsured', 10, 2);
            $table->string('paymentCode');
            $table->string('insurerTIN');
            $table->decimal('insuranceFee', 10, 2);
            $table->decimal('deductible', 10, 2);
            $table->timestamp('effectiveDate');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
