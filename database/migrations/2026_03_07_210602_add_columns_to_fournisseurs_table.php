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
        Schema::table('fournisseurs', function (Blueprint $table) {
            $table->string('type_fournisseur');
            $table->string('statut')->default('actif');

            $table->string('ice')->nullable();
            $table->string('if')->nullable();
            $table->string('rc')->nullable();
            $table->string('patente')->nullable();
            $table->string('cnss')->nullable();

            $table->string('telephone_secondaire')->nullable();
            $table->string('form_juridique')->nullable();

            $table->string('ville')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('pays')->nullable();

            $table->string('mode_paiement')->nullable();
            $table->integer('delai_paiement')->nullable();
            $table->integer('delai_livraison')->nullable();
            $table->string('conditions_paiement')->nullable();
            $table->date('date_expiration_contrat')->nullable();

            $table->string('banque')->nullable();
            $table->string('rib')->nullable();
            $table->string('iban')->nullable();

            $table->text('notes')->nullable();
            $table->string('documents')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fournisseurs', function (Blueprint $table) {
            //
        });
    }
};
