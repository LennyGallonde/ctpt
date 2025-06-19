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
        Schema::create('equipe_joueurs', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("annee");
            $table->foreignId("sport_id")->constrained("sports")->onDelete("cascade");
             $table->foreignId("cat_age_id")->constrained("categorie_ages")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipe_joueurs');
    }
};
