<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Edito;
use Illuminate\Http\Request;

class EditoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $edito=Edito::find(1);
        return view("admin.edito.edit",["edito"=>$edito]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Edito $edito)
    {
        $attributs=$request->validate([
            "titre"=>"required|string|max:255",
            "texte"=>"required|string|max:255"
        ]);
        $newEdito=$edito->update($attributs);
                  if($newEdito==null){
                  session()->flash("notifColor","danger");
          session()->flash("notif","Echec de la modification de l'édito.");
        }
        else{
         session()->flash("notifColor","success");
          session()->flash("notif","Modification de l'equipe l'édito.");
        }
        return redirect("/admin/edito");
    }


}
