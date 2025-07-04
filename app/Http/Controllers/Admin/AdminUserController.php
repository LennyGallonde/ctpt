<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EquipeJoueur;
use App\Models\EquipePedagogique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

//TODO : Chemin photo et notification
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = User::all();
        return view("admin.user.index", ["utilisateurs" => $utilisateurs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipeJoueurs = EquipeJoueur::all();
        $euqipePedagogique = EquipePedagogique::all();
        return view("admin.user.create", ["equipesJ" => $equipeJoueurs, "equipesP" => $euqipePedagogique]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributs = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'estVisible' => "required|boolean",
            'equipe_joueur_id[]' => "",
            'equipe_pedagogique_id[]' => "",
            'cheminPhoto' => 'image|mimes:jpeg,png,jpg,gif'
        ]);
        if ($request->file('cheminPhoto')) {
            $photo = $request->file('cheminPhoto');
            $cheminPhoto = $photo->store('photos/utilisateur');

            $utilisateur = User::create([
                'name' => $request->name,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'estVisible' => $request->estVisible,
                'cheminPhoto' => $cheminPhoto
            ]);
        } else {
            $utilisateur = User::create([
                'name' => $request->name,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'estVisible' => $request->estVisible,

            ]);
        }

          $utilisateur->equipeJoueurs()->sync($request->equipe_joueur_id ?? []);
        $utilisateur->equipePedagogique()->sync($request->equipe_pedagogique_id ?? []);

               if($utilisateur==null){
                  session()->flash("notifColor","danger");
          session()->flash("notif","Echec de la création de l'utilisateur".$utilisateur->name.".");
        }
        else{
         session()->flash("notifColor","success");
          session()->flash("notif","Création de l'utilisateur ".$utilisateur->name." .");
        }
        return redirect("/admin/user");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $utilisateur = User::findOrfail($id);
        $equipeJoueurs = EquipeJoueur::all();
        $euqipePedagogique = EquipePedagogique::all();
        return view("admin.user.edit", ["utilisateur" => $utilisateur, "equipesJ" => $equipeJoueurs, "equipesP" => $euqipePedagogique]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $utilisateur = User::findOrFail($id);

        $attributs = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', Rules\Password::defaults()],
            'estVisible' => ['required', 'boolean'],
            'equipe_joueur_id' => ['array'],
            'equipe_pedagogique_id' => ['array'],
            'cheminPhoto' => 'image|mimes:jpeg,png,jpg,gif',
            'estAdmin'=> 'boolean'
        ]);

        $utilisateur->name = $request->name;
        $utilisateur->firstname = $request->firstname;
        $utilisateur->email = $request->email;
        $utilisateur->estVisible = $request->estVisible;
        $utilisateur->estAdmin= $request->estAdmin;

        // Mettre à jour le mot de passe uniquement s'il est fourni
        if ($request->filled('password')) {
            $utilisateur->password = Hash::make($request->password);
        }
        if($request->cheminPhoto){
            if($utilisateur->cheminPhoto){
  Storage::delete($utilisateur->cheminPhoto);
            }

            $photo = $request->file('cheminPhoto');
            $cheminPhoto = $photo->store('photos/utilisateur');
            $utilisateur->cheminPhoto=$cheminPhoto;
        }

        $utilisateur->save();

        // Sync des équipes (remplace les anciennes par les nouvelles)
        $utilisateur->equipeJoueurs()->sync($request->equipe_joueur_id ?? []);
        $utilisateur->equipePedagogique()->sync($request->equipe_pedagogique_id ?? []);


               if($utilisateur==null){
                  session()->flash("notifColor","danger");
          session()->flash("notif","Echec de la modification de l'utilisateur".$utilisateur->name.".");
        }
        else{
         session()->flash("notifColor","success");
          session()->flash("notif","Modification de l'utilisateur ".$utilisateur->name." .");
        }
        return redirect("/admin/user");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilisateur = User::findOrfail($id);
        if($utilisateur->cheminPhoto){
               Storage::delete($utilisateur->cheminPhoto);
        }
        $utilisateur->delete();

        if(User::find($id)!=null){
                  session()->flash("notifColor","danger");
          session()->flash("notif","Echec de la suppression de ".$utilisateur->name.".");
        }
        else{
         session()->flash("notifColor","success");
          session()->flash("notif","Suppression de l'utilisateur ".$utilisateur->name." .");
        }
        return redirect("/admin/user");
    }
}

