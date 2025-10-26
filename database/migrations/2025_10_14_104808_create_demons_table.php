<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('origin');
            $table->foreignId('race_id')->constrained()->onDelete('cascade');
            $table->string('description', 1000);
            $table->string('image');
            $table->foreignId('added_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demons');
    }
};
