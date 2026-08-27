<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('history_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('event_date')->nullable();
            $table->integer('year')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('year');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history_events');
    }
};
