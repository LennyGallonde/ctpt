<?php

namespace App\Http\Controllers;

use App\Models\Article;
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

    public function consulterArticle(){
        //Permet d'obtenier tout les articles dans l'ordre décroisant (date de création)
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
       // De même mais limite le resultat a 5 articles
       $actualite = Article::orderBy('created_at', 'desc')->limit(5)->get();
      return view("visiteur.articles",["articles"=>$articles,"actualite"=>$actualite]);
    }
}
