<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EquipePedagogique;
use App\Models\Sport;
use App\Models\CategorieAge;
use App\Models\EquipeJoueur;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    
    return view("admin.equipe_pedagogique.create", [
        "lesSports" => $lesSports,
        "lesCategories" => $lesCategories
    ]);

}

    /**
     * Enregistre une nouvelle équipe pédagogique.
     */
    public function store(Request $request)
    {
        $attributs = $request->validate([
            "nom" => "required|min:2|max:255|string",
            "cat_age_id" => "required|exists:categorie_ages,id",
            "sport_id" => "required|exists:sports,id",
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);
        $equipePedagogique = EquipePedagogique::create($attributs);
        $estPrincipale = 1;
        foreach ($request->file('photos') as $photo) {


            $cheminPhoto = $photo->store('photos/equipesPedagogiques'); // ou use Storage::putFile() pour plus de contrôle
            $unePhoto = Photo::create(["chemin" => $cheminPhoto, "estPrincipale" => $estPrincipale, "equipe_pedagogiques_id" => $equipePedagogique->id]);
            if ($estPrincipale == 1) {
                $estPrincipale = 0;
            }
        }

        if ($equipePedagogique == null) {
            session()->flash("notifColor", "danger");
            session()->flash("notif", "Echec de la création de " . $equipePedagogique->nom . ".");
        } else {
            session()->flash("notifColor", "success");
            session()->flash("notif", "Ajout de l'equipe " . $equipePedagogique->nom . " .");
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


        if ($equipePedagogique == null) {
            session()->flash("notifColor", "danger");
            session()->flash("notif", "Echec de la modification de " . $equipePedagogique->nom . ".");
        } else {
            session()->flash("notifColor", "success");
            session()->flash("notif", "Modification de l'equipe " . $equipePedagogique->nom . " .");
        }
        return redirect("/admin/equipePedagogique");
    }

    /**
     * Supprime une équipe pédagogique.
     */
    public function destroy(EquipePedagogique $equipePedagogique)
    {

        $id = $equipePedagogique->id;

        foreach ($equipePedagogique->photos as $unePhoto) {
            Storage::delete($unePhoto->chemin);
            $unePhoto->delete();
        }

        $equipePedagogique->delete();

        if (EquipePedagogique::find($id) != null) {
            session()->flash("notifColor", "danger");
            session()->flash("notif", "Echec de la suppression de " . $equipePedagogique->nom . ".");
        } else {
            session()->flash("notifColor", "success");
            session()->flash("notif", "Suppression de l'equipe " . $equipePedagogique->nom . " .");
        }
        return redirect("/admin/equipePedagogique");
    }
    public function equipePedagogique()
{
    $lesEquipes = EquipePedagogique::with(['photos', 'sport', 'categorieAge', 'utilisateurs'])->get();
    return view("visiteur.club.equipe", compact('lesEquipes'));
}

}
