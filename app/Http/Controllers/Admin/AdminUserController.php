<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EquipeJoueur;
use App\Models\EquipePedagogique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'equipe_pedagogique_id[]' => ""
        ]);
        $utilisateur = User::create([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'estVisible' => $request->estVisible,

        ]);

        foreach ($request->equipe_joueur_id as $idEJ) {
            $uneEquipe = EquipeJoueur::find($idEJ);
            $uneEquipe->utilisateurs()->attach($utilisateur);
        }
        foreach ($request->equipe_pedagogique_id as $idEP) {
            $uneEquipe = EquipePedagogique::find($idEP);
            $uneEquipe->utilisateurs()->attach($utilisateur);
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
    ]);

    $utilisateur->name = $request->name;
    $utilisateur->firstname = $request->firstname;
    $utilisateur->email = $request->email;
    $utilisateur->estVisible = $request->estVisible;

    // Mettre à jour le mot de passe uniquement s'il est fourni
    if ($request->filled('password')) {
        $utilisateur->password = Hash::make($request->password);
    }

    $utilisateur->save();

    // Sync des équipes (remplace les anciennes par les nouvelles)
    $utilisateur->equipeJoueurs()->sync($request->equipe_joueur_id ?? []);
    $utilisateur->equipePedagogique()->sync($request->equipe_pedagogique_id ?? []);
          return redirect("/admin/user");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilisateur = User::findOrfail($id);
        $utilisateur->delete();
              return redirect("/admin/user");
    }
}
