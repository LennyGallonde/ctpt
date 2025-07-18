<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipeJoueur extends Model
{
    use HasFactory;
 protected $guarded=["id"];
    public function sport(){
       return  $this->belongsTo(Sport::class,"sport_id");
    }

        public function categorieAge(){
       return  $this->belongsTo(CategorieAge::class,"cat_age_id");
    }

        public function utilisateurs(){
        return $this->belongsToMany(User::class,"utilisateur_ej","equipe_joueur_id");
    }

            public function photos()
    {
        return $this->hasMany(Photo::class,"equipe_joueurs_id");
    }
}
