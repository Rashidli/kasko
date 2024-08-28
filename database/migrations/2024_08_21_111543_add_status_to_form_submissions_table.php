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
        Schema::table('form_submissions', function (Blueprint $table) {
            $table->string('note')->after('id');
            $table->enum('status',[1,2,3,4])->comment('1-Yeni, 2-Əlaqə saxlanıldı, 3-Müqavilə bağlanıldı, 4-İmtina edildi')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('form_submissions', function (Blueprint $table) {
            //
        });
    }
};
