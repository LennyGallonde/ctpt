<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TarifController extends Controller
{
    public function index()
    {
        $tarif = Tarif::first();
        return view('admin.tarif.index', compact('tarif'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tarif = Tarif::first();

        if ($tarif && Storage::exists('public/' . $tarif->image_path)) {
            Storage::delete('public/' . $tarif->image_path);
        }

        $path = $request->file('image')->store('photos', 'public');

        if (!$tarif) {
            $tarif = new Tarif();
        }

        $tarif->image_path = $path;
        $tarif->save();

        return redirect()->back()->with('success', 'Tarif mis à jour avec succès !');
    }
    public function showInscription()
{
    $tarif = \App\Models\Tarif::first(); 
    return view('inscription', compact('tarif'));
}

}
