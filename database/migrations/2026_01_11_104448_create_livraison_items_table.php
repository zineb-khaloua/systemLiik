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
        Schema::create('livraison_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livraison_id')
                  ->constrained('bon_livraisons')
                  ->onDelete('cascade');
            $table->foreignId('produit_id')
                  ->nullable()
                  ->constrained('produits')
                  ->onDelete('restrict');
            $table->string('designation');
            $table->text('description')->nullable();
            $table->decimal('quantite', 10, 2)->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraison_items');
    }
};
