<?php
namespace App\Http\Controllers;

use App\Models\EquipeJoueur;
use App\Models\Sport;
use App\Models\CategorieAge;
use Illuminate\Http\Request;

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
        return view("admin.equipe joueur.index", ["lesEquipes" => $lesEquipesJ]);
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
        return view("admin.equipe joueur.create", ["lesSports" => $lesSports, "lesCategories" => $lesCategories]);
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
            "sport_id" => "required|exists:sports,id"
        ]);
//Enregistrement dans la bdd
        $newEquipe = EquipeJoueur::create($attributs);
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
        return view("admin.equipe joueur.show", ["uneEquipe" => $equipeJoueur]);
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
        return view("admin.equipe joueur.edit", [
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
        $equipeJoueur->delete();
        return redirect("/admin/equipeJoueur");
    }
}
