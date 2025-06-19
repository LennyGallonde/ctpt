<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipePedagogique extends Model
{
    use HasFactory;
 protected $guarded=["id"];
 //TODO Association avec cat age
 //TODO Association avec sport
           public function utilisateurs(){
        return $this->belongsToMany(User::class,"utilisateur_ep","equipe_pedagogique_id");
    }
}
