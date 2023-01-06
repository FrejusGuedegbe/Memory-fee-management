<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTable7Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table 7', function (Blueprint $table) {
            $table->string('matricule', 9)->nullable();
            $table->string('nom', 16)->nullable();
            $table->string('prenom', 54)->nullable();
            $table->string('dateNais', 13)->nullable();
            $table->string('lieuNais', 23)->nullable();
            $table->string('sexe', 4)->nullable();
            $table->string('dateIns', 18)->nullable();
            $table->string('universite', 10)->nullable();
            $table->string('etablissement', 13)->nullable();
            $table->string('filliereAnnee', 24)->nullable();
            $table->string('tauxMensuel', 12)->nullable();
            $table->string('typeAllocat', 17)->nullable();
            $table->string('RIB', 29)->nullable();
            $table->string('banque', 10)->nullable();
            $table->string('montantNet', 19)->nullable();
            $table->string('retenue', 7)->nullable();
            $table->string('anneeAcademique', 15)->nullable();
            $table->string('intituléEtat', 22)->nullable();
            $table->string('debutEcheance', 14)->nullable();
            $table->string('finEcheance', 12)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table 7');
    }
}
