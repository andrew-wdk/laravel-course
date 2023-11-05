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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('NationalID')->nullable();
            $table->tinyInteger('choosingsection')->nullable();
            $table->string('telephone-no')->nullable();
            $table->text('address')->nullable();
            $table->string('father')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('NationalID');
            $table->dropColumn('choosingsection');
            $table->dropColumn('telephone-no');
            $table->dropColumn('address');
            $table->dropColumn('father');
        });
    }
};
