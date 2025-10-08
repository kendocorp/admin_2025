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
        Schema::table('cognito_users', function (Blueprint $table) {
            $table->string('status')->default('pendiente')->after('sub')->nullable();
            $table->string('contract')->nullable()->after('status');
            $table->string('entity')->nullable()->after('contract');
            $table->string('semester')->nullable()->after('entity');
            $table->string('course')->nullable()->after('semester');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cognito_users', function (Blueprint $table) {
            //
        });
    }
};
