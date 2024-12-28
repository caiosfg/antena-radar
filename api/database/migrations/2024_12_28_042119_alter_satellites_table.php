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
        Schema::table('satellites', function (Blueprint $table) {
            $table->date("start_date")->nullable()->default(null)->change();
            $table->date("end_date")->nullable()->default(null)->change();
            $table->decimal('height')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('satellites', function (Blueprint $table) {
            $table->date("start_date")->change();
            $table->date("end_date")->change();
        });

    }
};
