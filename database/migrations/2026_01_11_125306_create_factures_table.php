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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                  ->constrained('clients')
                  ->onDelete('restrict');
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('restrict');
            $table->foreignId('devis_id')
                  ->nullable()
                  ->constrained('devis')
                  ->onDelete('restrict');
            $table->string('numero')->unique();
            $table->date('date');
            $table->enum('statut', ['livre', 'partiel', 'annule'])
                  ->default('livre');
                  
            $table->decimal('total_ht', 10, 2)->default(0);
            $table->decimal('total_tva', 5, 2)->default(0);
            $table->decimal('total_ttc', 10, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
