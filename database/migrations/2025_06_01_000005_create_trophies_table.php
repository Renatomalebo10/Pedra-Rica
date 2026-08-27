<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trophies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('competition')->nullable();
            $table->integer('year')->nullable();
            $table->foreignId('season_id')->nullable()->constrained()->nullOnDelete();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->index('season_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trophies');
    }
};
