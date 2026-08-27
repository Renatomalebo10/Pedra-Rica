<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->integer('number')->nullable();
            $table->string('position')->nullable();
            $table->text('biography')->nullable();
            $table->foreignId('season_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->integer('goals')->default(0);
            $table->integer('assists')->default(0);
            $table->integer('yellow_cards')->default(0);
            $table->integer('red_cards')->default(0);
            $table->integer('matches_played')->default(0);
            $table->timestamps();

            $table->index('season_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
