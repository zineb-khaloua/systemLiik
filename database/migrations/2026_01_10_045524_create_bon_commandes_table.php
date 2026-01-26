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
        Schema::create('bon_commandes', function (Blueprint $table) {
            $table->id();

             $table->foreignId('client_id')
                  ->nullable()
                  ->constrained('clients')
                  ->onDelete('restrict'); 
            $table->foreignId('fournisseur_id')
                  ->nullable()
                  ->constrained('fournisseurs')
                  ->onDelete('restrict'); 
            $table->foreignId('devis_id')
                  ->nullable() 
                  ->constrained('devis')
                  ->onDelete('restrict');

            $table->foreignId('user_id')
               ->constrained('users')
                  ->onDelete('restrict'); 

            $table->string('numero')->unique(); 
            $table->date('date');
            $table->enum('statut', ['en_attente','partiel','recu','annule'])->default('en_attente');

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
        Schema::dropIfExists('bon_commandes');
    }
};
