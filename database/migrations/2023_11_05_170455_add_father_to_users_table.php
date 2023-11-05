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
            $table->bigInteger('NationalID');
            $table->tinyInteger('choosingsection');
            $table->bigInteger('telephone-no')->nullable();
            // $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // another way to add constraint
            $table->text('address');
            $table->text('father');
            $table->text('other-input');
            
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
            $table->dropColumn('other-input');
        });
    }
};
