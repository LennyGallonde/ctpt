<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

   protected $guarded = ["id"];

       public function equipePedagogique()
    {
        return $this->belongsTo(EquipePedagogique::class, "equipe_pedagogiques_id");
    }

           public function equipeJoueur()
    {
        return $this->belongsTo(EquipeJoueur::class, "equipe_joueurs_id");
    }
    //TODO associaiton avec article
}
