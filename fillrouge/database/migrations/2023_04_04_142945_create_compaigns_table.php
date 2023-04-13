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
        Schema::create('compaigns', function (Blueprint $table) {
            $table->id();
            $table
            ->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete();
            $table->foreignId('category_id');
            $table->string('title');
            $table->string('thumbnail')->nullable();
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('body');
            $table->text('country');
            $table->text('address');
            $table->text('city');
            $table->text('region');
            $table->text('postal');
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
