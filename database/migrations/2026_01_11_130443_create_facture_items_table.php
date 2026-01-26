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
        Schema::create('facture_items', function (Blueprint $table) {
            $table->id();
            

            $table->foreignId('facture_id')
                  ->constrained('factures')
                  ->onDelete('cascade');

            $table->foreignId('produit_id')
                  ->nullable()
                  ->constrained('produits')
                  ->onDelete('restrict');

            $table->string('designation');
            $table->text('description')->nullable();

            $table->decimal('quantite', 10, 3)->default(1);
            $table->decimal('prix_unitaire', 12, 2)->default(0);
            $table->decimal('taux_tva', 5, 2)->default(20);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture_items');
    }
};
