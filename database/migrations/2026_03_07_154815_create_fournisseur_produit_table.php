<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('fournisseur_produit', function (Blueprint $table) {
        $table->id();
        
        $table->foreignId('fournisseur_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('produit_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->decimal('prix_achat', 10, 2);

            $table->string('reference_fournisseur')->nullable();

            $table->timestamps();

            $table->unique(['fournisseur_id','produit_id']);
      
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fournisseur_produit');
    }
};
