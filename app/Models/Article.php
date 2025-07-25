<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
  protected $guarded=["id"];
        public function user(){
        return $this->belongsTo(User::class);
    }
         public function photos()
    {
        return $this->hasMany(Photo::class,"articles_id");
    }

    public function sport(){
        return $this->belongsTo(Sport::class,"sport_id");
    }
}
