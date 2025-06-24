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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string("chemin");
            $table->boolean("estPrincipale");
               $table->foreignId("equipe_joueurs_id")->nullable()->constrained("equipe_joueurs")->onDelete("cascade");
               $table->foreignId("equipe_pedagogiques_id")->nullable()->constrained("equipe_pedagogiques")->onDelete("cascade");
               //TODO Cles avec les articles de blog
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
