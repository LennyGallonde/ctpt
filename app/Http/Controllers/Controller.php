<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\EquipeJoueur;
use App\Models\Sport;
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

    public function consulterArticle($idSport){
        $leSport=Sport::findOrFail($idSport);
        //Permet d'obtenier tout les articles dans l'ordre décroisant (date de création)
        $articles = Article::where("sport_id",$idSport)->orWhereNull('sport_id')->orderBy('created_at', 'desc')->paginate(5);
       // De même mais limite le resultat a 5 articles
       $actualite = Article::where("sport_id",$idSport)->orWhereNull('sport_id')->orderBy('created_at', 'desc')->limit(5)->get();
      return view("visiteur.articles",["articles"=>$articles,"actualite"=>$actualite,"leSport"=>$leSport]);
    }
    public function structure (){return view ("visiteur.club.structure");}

}
