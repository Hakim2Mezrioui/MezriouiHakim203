<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FournisseurController extends Controller
{
    function ajouterFournisseur() {
        return view("ajouterFournisseurs");
    }

    function ajouterFournisseurToDb(Request $request) {
        DB::table("fournisseurs")->insert([
            "raisonSociale"=>$request->raisonSociale,
            "addresse"=>$request->addresse,
            "telephone"=>$request->telephone,
        ]);

        return redirect("/");
    }

    function afficherFournisseurs() {
        $fournisseurs = DB::table('fournisseurs')->get();
        return view("fournisseurs")->with('fournisseurs', $fournisseurs);
    }

    function supprimer_fournisseur($id) {
        $fournisseurs = DB::table("fournisseurs")->find($id);
        if(!empty($fournisseurs)) {
            $fournisseurs->delete();
        }
        return redirect("/afficher_fournisseurs");

    }

    function modifier_fournisseur($id) {
        $fournisseur = DB::table("fournisseurs")->find($id);

        return view("modifierFournisseur")
        ->with('fournisseur', $fournisseur);
    }

    function modifier_fournisseur_db(Request $request) {
        $fournisseur = DB::table("fournisseurs")->find($request->id);

        if(!empty($fournisseur)) {
            $fournisseur = DB::table("fournisseurs")
            ->where("id", "=", $request->id)
            ->update([
                "raisonSociale"=>$request->raisonSociale,
                "addresse"=>$request->addresse,
                "telephone"=>$request->telephone,
            ]);

        }


        return redirect("afficher_fournisseurs");
    }
}
