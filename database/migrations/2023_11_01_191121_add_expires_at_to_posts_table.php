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
        Schema::table('posts', function (Blueprint $table) {
            $table->dateTime('expires_at')->nullable()->after('publish_at');
            $table->dropColumn('attachment');
            $table->datetime('publish_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('attachment')->nullable();
            $table->dropColumn('expires_at');
            $table->datetime('publish_at')->nullable(false)->change();
        });
    }
};
