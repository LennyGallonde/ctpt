<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipeJoueur extends Model
{
    use HasFactory;

    public function sport(){
       return  $this->belongsTo(Sport::class,"sport_id");
    }

        public function categorieAge(){
       return  $this->belongsTo(CategorieAge::class,"cat_age_id");
    }

        public function utilisateurs(){
        return $this->belongsToMany(User::class,"utilisateur_ej","equipe_joueur_id");
    }
}
