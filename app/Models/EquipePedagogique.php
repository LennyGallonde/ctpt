<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipePedagogique extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function sport()
    {
        return $this->belongsTo(Sport::class, "sport_id");
    }

    public function categorieAge()
    {
        return $this->belongsTo(CategorieAge::class, "cat_age_id");
    }

    // Association avec les utilisateurs
    public function utilisateurs()
    {
        return $this->belongsToMany(User::class, "utilisateur_ep", "equipe_pedagogique_id");
    }
}
