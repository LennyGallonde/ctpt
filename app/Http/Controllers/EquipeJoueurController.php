<?php
namespace App\Http\Controllers;

use App\Models\EquipeJoueur;
use App\Models\Sport;
use App\Models\CategorieAge;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipeJoueurController extends Controller
{
    /**
     * Affiche la liste de toutes les équipes.
     *
     * @return \Illuminate\View\View La vue contenant la liste des équipes.
     */
    public function index()
    {
        $lesEquipesJ = EquipeJoueur::all();
        return view("admin.equipeJoueur.index", ["lesEquipes" => $lesEquipesJ]);
    }

    /**
     * Affiche le formulaire de création d'une équipe.
     *
     * @return \Illuminate\View\View La vue du formulaire de création avec les sports et catégories disponibles.
     */
    public function create()
    {
        //On recupere les sports et cats pour constituer les options des listes deroulantes
        $lesSports = Sport::all();
        $lesCategories = CategorieAge::all();
        return view("admin.equipeJoueur.create", ["lesSports" => $lesSports, "lesCategories" => $lesCategories]);
    }

    /**
     * Enregistre une nouvelle équipe dans la base de données.
     *
     * @param Request $request Les données envoyées depuis le formulaire.
     * @return \Illuminate\Http\RedirectResponse Redirige vers la liste des équipes.
     */
    public function store(Request $request)
    {
        //La validation du formulaire
        $attributs = $request->validate([
            "nom" => "required|min:2|max:255|string",
            "annee" => "required",
            "cat_age_id" => "required|exists:categorie_ages,id",
            "sport_id" => "required|exists:sports,id",
              'photos.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);
//Enregistrement dans la bdd
        $newEquipe = EquipeJoueur::create($attributs);
            $estPrincipale = 1;
        foreach ($request->file('photos') as $photo) {


            $cheminPhoto = $photo->store('photos/equipesJoueurs'); // ou use Storage::putFile() pour plus de contrôle
            $unePhoto = Photo::create(["chemin" => $cheminPhoto, "estPrincipale" => $estPrincipale, "equipe_joueurs_id" => $newEquipe->id]);
            if ($estPrincipale == 1) {
                $estPrincipale = 0;
            }
        }
        if($newEquipe==null){
                  session()->flash("notifColor","danger");
          session()->flash("notif","Echec de la création de ".$newEquipe->nom.".");
        }
        else{
         session()->flash("notifColor","success");
          session()->flash("notif","Ajout de l'equipe ".$newEquipe->nom." .");
        }

        return redirect("/admin/equipeJoueur");
    }

    /**
     * Affiche les détails d'une équipe spécifique.
     *
     * @param EquipeJoueur $equipeJoueur L’équipe à afficher.
     * @return \Illuminate\View\View La vue affichant les détails de l’équipe.
     */
    public function show(EquipeJoueur $equipeJoueur)
    {
        return view("admin.equipeJoueur.show", ["uneEquipe" => $equipeJoueur]);
    }

    /**
     * Affiche le formulaire de modification d'une équipe.
     *
     * @param EquipeJoueur $equipeJoueur L’équipe à modifier.
     * @return \Illuminate\View\View Le formulaire prérempli de l’équipe.
     */
    public function edit(EquipeJoueur $equipeJoueur)
    {
        //De même que pour le create on veut les sports et cats pour les listes déroulantes
        $lesSports = Sport::all();
        $lesCategories = CategorieAge::all();
        //On envoi aussi l'equipe que on veut modifier pour pré-remplir le formulaire
        return view("admin.equipeJoueur.edit", [
            "equipeJoueur" => $equipeJoueur,
            "lesSports" => $lesSports,
            "lesCategories" => $lesCategories
        ]);
    }

    /**
     * Met à jour une équipe dans la base de données.
     *
     * @param Request $request Les données mises à jour envoyées depuis le formulaire.
     * @param EquipeJoueur $equipeJoueur L’équipe à mettre à jour.
     * @return \Illuminate\Http\RedirectResponse Redirige vers la liste des équipes.
     */
    public function update(Request $request, EquipeJoueur $equipeJoueur)
    {
        //Validation du formulaire
        $attributs = $request->validate([
            "id" => "required|exists:equipe_joueurs,id",
            "nom" => "required|min:2|max:255|string",
            "annee" => "required",
            "cat_age_id" => "required|exists:categorie_ages,id",
            "sport_id" => "required|exists:sports,id"
        ]);
        //Enregistrement des modifs dans la bdd
        $equipeJoueur->update($attributs);
               if($equipeJoueur==null){
                  session()->flash("notifColor","danger");
          session()->flash("notif","Echec de la modification de ".$equipeJoueur->nom.".");
        }
        else{
         session()->flash("notifColor","success");
          session()->flash("notif","Modification de l'equipe ".$equipeJoueur->nom." .");
        }
        return redirect("/admin/equipeJoueur");
    }

    /**
     * Supprime une équipe de la base de données.
     *
     * @param EquipeJoueur $equipeJoueur L’équipe à supprimer.
     * @return \Illuminate\Http\RedirectResponse Redirige vers la liste des équipes.
     */
    public function destroy(EquipeJoueur $equipeJoueur)
    {
        //Supprime l'equipe dans la bdd
        $id=$equipeJoueur->id;
          foreach ($equipeJoueur->photos as $unePhoto) {
            Storage::delete($unePhoto->chemin);
            $unePhoto->delete();
        }
        $equipeJoueur->delete();
                    if(EquipeJoueur::find($id)!=null){
                  session()->flash("notifColor","danger");
          session()->flash("notif","Echec de la suppression de ".$equipeJoueur->nom.".");
        }
        else{
         session()->flash("notifColor","success");
          session()->flash("notif","Suppression de l'equipe ".$equipeJoueur->nom." .");
        }
        return redirect("/admin/equipeJoueur");
    }
}
