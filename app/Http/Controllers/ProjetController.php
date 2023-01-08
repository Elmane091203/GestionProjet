<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = DB::select("SELECT * FROM projets ORDER BY id");
        return view("projets/acceuil", ["projets" => $projets]);
    }
    public function enregistrer()
    {
        $message = "Le ou les champs suivants n'ont pas été remplis :\t";
        if (empty($_POST)) {
            return view("projets/ajout", ["message" => "Erreur d'enregistrement!"]);
        }
        extract($_POST);
        if (empty($nomProjet)) {
            $message = $message . "Le nom du projet,\t";
        }
        if (empty($description)) {
            $message = $message . "La description du projet,\t";
        }
        if (empty($date_debut)) {
            $message = $message . "La date de debut du projet,\t";
        }
        if (empty($date_fin)) {
            $message = $message . "La date de fin du projet";
        }
        if ($message != "Le ou les champs suivants n'ont pas été remplis :\t") {
            // dd($message);
            return redirect("ajout")->with("message", $message);
        }
        DB::table('projets')->insert([
            'nomProjet' => $nomProjet,
            'description' => $description,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
        ]);
        $projets = Projet::all();
        return redirect("")->with("projets", $projets);
    }
    public function detail()
    {
        if (session('detP') == null) {
            # code...
            $id = $_GET['id'];
            $projet = DB::select("SELECT * FROM projets WHERE id=$id");
            $phases = DB::select("SELECT * FROM phases WHERE idProjet=$id");
            return redirect('detail')->with("detP", ["projet" => $projet, "phases" => $phases]);
        }
        $projet = session('detP')["projet"];
        $phases = session('detP')["phases"];
        $tab = ["projet" => $projet, "phases" => $phases];
        return view('projets/detail', ["detP" => (session('detP') == null) ? session('detP') : $tab]);
    }
    public function ajout()
    {
        return view('projets/ajout');
    }
}
