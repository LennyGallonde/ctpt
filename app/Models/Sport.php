<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
 protected $guarded=["id"];
    public function equipeJoueurs(){
        return $this->hasMany(EquipeJoueur::class);
    }
}
