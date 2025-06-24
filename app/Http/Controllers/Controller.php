<?php

namespace App\Http\Controllers;

use App\Models\EquipeJoueur;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function consulterEquipesJ(){
        $lesEquipesJ= EquipeJoueur::all();
        return view("visiteur.equipes.ej",["lesEquipes"=>$lesEquipesJ]);
    }
}
