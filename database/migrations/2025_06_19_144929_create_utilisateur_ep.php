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
        Schema::create('utilisateur_ep', function (Blueprint $table) {
               $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            $table->foreignId("equipe_pedagogique_id")->constrained("equipe_pedagogiques")->onDelete("cascade");
            $table->primary(["user_id","equipe_pedagogique_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur_ep');
    }
};
