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
        Schema::create('contract_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->onDelete('cascade');
            $table->string('reference_contrat')->unique();
            $table->date('date_signature');
            $table->date('date_debut');
            $table->date('date_expiration');
            $table->string('fichier_pdf')->nullable();
            $table->text('conditions');
            $table->enum ('statut',['actif','expiré','suspendu'])->default('actif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_fournisseurs');
    }
};
