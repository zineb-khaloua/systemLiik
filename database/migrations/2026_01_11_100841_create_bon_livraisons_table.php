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
        Schema::create('bon_livraisons', function (Blueprint $table) {
            $table->id();
          
            $table->foreignId('client_id')
                   ->constrained('clients')
                   ->onDelete('restrict');
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('restrict');
             $table->foreignId('commande_id')
                    ->nullable() 
                    ->constrained('bon_commandes')
                    ->onDelete('restrict');
            $table->string('numero')->unique();
            $table->date('date');
            $table->enum('statut', ['livre', 'partiel', 'annule'])
                       ->default('livre');
            $table->decimal('notes')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_livraisons');
    }
};
