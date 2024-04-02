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
        Schema::create('manifestations', function (Blueprint $table) {
            $table->id();
            $table->string('protocol_number');
            $table->foreignId('manifestation_status_id')->constrained('manifestation_statuses')->restrictOnDelete();
            $table->foreignId('manifestation_type_id')->constrained('manifestation_types')->restrictOnDelete();
            $table->enum('comunication_type', ['anonymous', 'confidential', 'public']);
            $table->string('name')->nullable();
            $table->string('cpf')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->enum('reported', ['management', 'employees', 'outsourced', 'agents', 'others'])
                ->nullable()
                ->comment('Direção, Empregados, Terceirizados, Prepostos, Mais de uma categoria ou outros');
            $table->string('description');
            $table->foreignId('request_reason_id')->nullable()->constrained('request_reasons')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manifestations');
    }
};
