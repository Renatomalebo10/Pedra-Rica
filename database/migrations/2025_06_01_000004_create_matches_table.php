<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('opponent');
            $table->string('opponent_logo')->nullable();
            $table->date('match_date');
            $table->time('match_time')->nullable();
            $table->string('location')->nullable();
            $table->foreignId('competition_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('season_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('our_score')->nullable();
            $table->integer('opponent_score')->nullable();
            $table->string('status')->default('upcoming');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('competition_id');
            $table->index('season_id');
            $table->index('match_date');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
