<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Photo;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lesArticles = Article::all();
        return view("admin.article.index", ["lesArticles" => $lesArticles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.article.create",["lesSports"=>Sport::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auteur = auth()->user();

        $attributs = $request->validate([
            "titre" => "required|min:2|max:255|string",
            "texte" => "required|string",
              "sport_id" => "nullable|exists:sports,id"
        ]);
        $attributs["user_id"] = $auteur->id;
        $unArticle = Article::create($attributs);
        $estPrincipale = 1;
        foreach ($request->file('photos') as $photo) {
            $cheminPhoto = $photo->store('photos/article'); // ou use Storage::putFile() pour plus de contrôle
            $unePhoto = Photo::create(["chemin" => $cheminPhoto, "estPrincipale" => $estPrincipale, "articles_id" => $unArticle->id]);
            if ($estPrincipale == 1) {
                $estPrincipale = 0;
            }
        }

        if ($unArticle == null) {
            session()->flash("notifColor", "danger");
            session()->flash("notif", "Echec de la création de " . $unArticle->nom . ".");
        } else {
            session()->flash("notifColor", "success");
            session()->flash("notif", "Ajout de l'equipe " . $unArticle->nom . " .");
        }

        return redirect("/admin/article");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $unArticle = Article::findOrFail($id);
        return view("admin.article.show", ["article" => $unArticle]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unArticle = Article::findOrFail($id);
        return view("admin.article.edit", ["unArticle" => $unArticle,"lesSports"=>Sport::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $attributs = $request->validate([
            "titre" => "required|min:2|max:255|string",
            "texte" => "required|string",
            "sport_id" => "nullable|exists:sports,id"
        ]);
        $article = Article::findOrFail($id);
        $article->update($attributs);
        if ($article == null) {
            session()->flash("notifColor", "danger");
            session()->flash("notif", "Echec de la modification de " . $article->titre . ".");
        } else {
            session()->flash("notifColor", "success");
            session()->flash("notif", "Modification de l'article : " . $article->titre . " .");
        }
        return redirect("/admin/article");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        //Supprime l'equipe dans la bdd

        foreach ($article->photos as $unePhoto) {
            Storage::delete($unePhoto->chemin);
            $unePhoto->delete();
        }
        $article->delete();
        if (Article::find($id) != null) {
            session()->flash("notifColor", "danger");
            session()->flash("notif", "Echec de la suppression de " . $article->titre . ".");
        } else {
            session()->flash("notifColor", "success");
            session()->flash("notif", "Suppression de l'article " . $article->titre . " .");
        }
        return redirect("/admin/article");
    }
}
