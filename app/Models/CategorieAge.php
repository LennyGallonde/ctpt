<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieAge extends Model
{
    use HasFactory;
 protected $guarded=["id"];
        public function equipeJoueurs(){
        return $this->hasMany(EquipeJoueur::class);
    }
}
