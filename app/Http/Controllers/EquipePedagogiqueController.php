<?php

namespace App\Http\Controllers;

use App\Models\EquipePedagogique;
use App\Models\Sport;
use App\Models\CategorieAge;
use App\Models\EquipeJoueur;
use Illuminate\Http\Request;

class EquipePedagogiqueController extends Controller
{
    /**
     * Affiche la liste des équipes pédagogiques.
     */
    public function index()
    {
        $lesEquipesP = EquipePedagogique::all();
        return view("admin.equipe_pedagogique.index", ["lesEquipes" => $lesEquipesP]);
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        $lesSports = Sport::all();
        $lesCategories = CategorieAge::all();
        return view("admin.equipe_pedagogique.create", ["lesSports" => $lesSports, "lesCategories" => $lesCategories]);
    }

    /**
     * Enregistre une nouvelle équipe pédagogique.
     */
    public function store(Request $request)
    {
        $attributs = $request->validate([
       "nom" => "required|min:2|max:255|string",
            "cat_age_id" => "required|exists:categorie_ages,id",
            "sport_id" => "required|exists:sports,id"
        ]);

        $equipePedagogique=EquipePedagogique::create($attributs);

                if($equipePedagogique==null){
                  session()->flash("notifColor","danger");
          session()->flash("notif","Echec de la création de ".$equipePedagogique->nom.".");
        }
        else{
         session()->flash("notifColor","success");
          session()->flash("notif","Ajout de l'equipe ".$equipePedagogique->nom." .");
        }

        return redirect("/admin/equipePedagogique");
    }

    /**
     * Affiche une équipe pédagogique spécifique.
     */
    public function show(EquipePedagogique $equipePedagogique)
    {
        return view("admin.equipe_pedagogique.show", ["uneEquipe" => $equipePedagogique]);
    }

    /**
     * Affiche le formulaire d'édition.
     */
    public function edit(EquipePedagogique $equipePedagogique)
    {
        $lesSports = Sport::all();
        $lesCategories = CategorieAge::all();
        return view("admin.equipe_pedagogique.edit", [
            "equipePedagogique" => $equipePedagogique,
            "lesSports" => $lesSports,
            "lesCategories" => $lesCategories
        ]);
    }

    /**
     * Met à jour une équipe pédagogique.
     */
    public function update(Request $request, EquipePedagogique $equipePedagogique)
    {
        $attributs = $request->validate([
            "nom" => "required|min:2|max:255|string",
            "cat_age_id" => "required|exists:categorie_ages,id",
            "sport_id" => "required|exists:sports,id"
        ]);

        $equipePedagogique->update($attributs);


                       if($equipePedagogique==null){
                  session()->flash("notifColor","danger");
          session()->flash("notif","Echec de la modification de ".$equipePedagogique->nom.".");
        }
        else{
         session()->flash("notifColor","success");
          session()->flash("notif","Modification de l'equipe ".$equipePedagogique->nom." .");
        }
        return redirect("/admin/equipePedagogique");
    }

    /**
     * Supprime une équipe pédagogique.
     */
    public function destroy(EquipePedagogique $equipePedagogique)
    {

             $id=$equipePedagogique->id;
        $equipePedagogique->delete();

                    if(EquipePedagogique::find($id)!=null){
                  session()->flash("notifColor","danger");
          session()->flash("notif","Echec de la suppression de ".$equipePedagogique->nom.".");
        }
        else{
         session()->flash("notifColor","success");
          session()->flash("notif","Suppression de l'equipe ".$equipePedagogique->nom." .");
        }
        return redirect("/admin/equipePedagogique");
    }
}
