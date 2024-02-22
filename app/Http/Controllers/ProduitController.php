<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class ProduitController extends Controller
{
    function ajouterProduit(Request $request) {
        $fournisseurs = DB::table("fournisseurs")->get();
        return view("ajouterProduit")->with("fournisseurs", $fournisseurs);
    }

    function ajouterProduitToDb(Request $request) {
        $request->validate([
            "description"=>'required|max:30',
            "prix"=>"required|numeric|between:10,10000",
            "date" => "nullable|date|after:today",
        ]);
        
        DB::table("produits")->insert([
            "description"=>$request->description,
            "prix"=>$request->prix,
            "date"=>$request->date,
            "fournisseur_id"=>$request->fournisseur_id,
        ]);

        return redirect("/");
    }

    function afficherProduits(Request $request) {
        $produits = DB::table('produits')->join("fournisseurs", "fournisseurs.id", "=", "produits.fournisseur_id")->select(["produits.*", "fournisseurs.raisonSociale"])->get();
        return view("produits")->with("produits", $produits);
    }

    function supprimer_produit($id) {
        $produit = DB::table("produits")->find($id);
        return $produit;
        if(empty($produit)) {
            $produit->delete();
        }
        return redirect("/afficher_produits");
    }

    function modifier_produit($id) {
        $produit = DB::table("produits")
        ->join("fournisseurs", "produits.fournisseur_id", "=", "fournisseurs.id")
        ->select(["produits.*", "fournisseurs.raisonSociale"])
        ->where("produits.id", "=", $id)->first();

        $fournisseurs = DB::table("fournisseurs")->get();

        return view("modifierProduit")
        ->with(["produit" => $produit, "fournisseurs" => $fournisseurs]);
        // return view("modifierProduit", [])
    }

    function modifier_produit_db(Request $request) {
        $produit = DB::table("produits")->where('id', '=', $request->id)->first();

        if(!empty($produit)) {
            DB::table('produits')->where("id", "=", $request->id)->update([
                "description"=>$request->description,
                'prix'=>$request->prix,
                'date'=>$request->date,
                'fournisseur_id'=>$request->fournisseur_id,
            ]);
        }

        return redirect("afficher_produits");
    }

    function afficher_produits_par_raisonsocial() {
        $raisonSociales = DB::table("fournisseurs")->select("raisonSociale")->get();
        $selectedRaisonSociale = null;

        return view("afficher_produits_par_raisonsocial", compact(["raisonSociales", "selectedRaisonSociale"]));   
    }

    function afficher_produits_par_raisonsocial_db(Request $request) {
        $raisonSociales = DB::table('fournisseurs')->select("raisonSociale")->get();
        
        $selectedRaisonSociale = $request->raisonSociale;

        $produits = DB::table("produits")
        ->join("fournisseurs", "produits.fournisseur_id", "=", "fournisseurs.id")
        ->select(["produits.*", "fournisseurs.raisonSociale"])->where("raisonSociale", "=", $request->raisonSociale)
        ->get();
        return view('afficher_produits_par_raisonsocial', compact(["produits", "raisonSociales", "selectedRaisonSociale"]));
    }

    function dashboard() {
        $nbrProduit = DB::table('produits')->count();
        $nbrFournisseur = DB::table("fournisseurs")->count();
        $prixMax = DB::table("produits")->max("prix");
        $prixMin = DB::table("produits")->min("prix");

        $nbrProduitByFournisseur = DB::table('fournisseurs')
        ->leftJoin('produits', 'fournisseurs.id', '=', 'produits.fournisseur_id')
        ->select('fournisseurs.id', "fournisseurs.raisonSociale", DB::raw('COUNT(produits.id) as nombre_produits'))
        ->groupBy('fournisseurs.id')
        ->get();

        // foreach ($fournisseurs as $fournisseur) {
        //     echo "Fournisseur ID: " . $fournisseur->id . "Raison Sociale: " . $fournisseur->raisonSociale . ", Nombre de produits: " . $fournisseur->nombre_produits . "<br />";
        // }

        return view('dashboard', compact('nbrProduit', 'nbrFournisseur', 'prixMax', 'prixMin', 'nbrProduitByFournisseur'));
    }
}
