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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('attachment')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // another way to add constraint
            $table->boolean('status')->default(1);
            $table->tinyInteger('type')->default(1);
            $table->dateTime('publish_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
