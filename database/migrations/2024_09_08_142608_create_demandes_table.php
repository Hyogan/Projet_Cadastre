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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('arrondissement');
            $table->string('numero_du_titre_foncier');
            $table->decimal('superficie', 10, 2);
            
            $table->string('departement');
            $table->string('localite');
            $table->bigInteger('budget');
            
            $table->string('destination');
            $table->enum('statut', ['en_attente', 'approuve', 'rejete']);
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
