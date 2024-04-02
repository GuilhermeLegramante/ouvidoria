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
        Schema::create('manifestation_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manifestation_id')->constrained('manifestations')->restrictOnDelete();
            $table->foreignId('previous_manifestation_status_id')->constrained('manifestation_statuses')->restrictOnDelete();
            $table->foreignId('current_manifestation_status_id')->constrained('manifestation_statuses')->restrictOnDelete();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manifestation_movements');
    }
};
