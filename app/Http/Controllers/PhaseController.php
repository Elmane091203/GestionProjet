<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhaseController extends Controller
{
    
    public function index()
    {
        $id = $_GET['id'];
        return view("projets/detail?id=$id");
    }
    /*public function ajouter()
    {
        $id = $_GET['idP'];
        $message = "Le ou les champs suivants n'ont pas été remplis :\t";
        if (empty($_POST)) {
            return view("projets/phase", ["message" => "Erreur d'enregistrement!","idP"=>$id]);
        }
        extract($_POST);
        if (empty($nomPhase)) {
            $message = $message . "Le nom du projet,\t";
        }
        $durree = $jour*24*60+$h*60+$min;
        if (empty($durree)) {
            $message = $message . "La description du projet,\t";
        }
        if (empty($priorite)) {
            $message = $message . "La date de debut du projet,\t";
        }
        if ($message != "Le ou les champs suivants n'ont pas été remplis :\t") {
            // dd($message);
            return redirect("phase?idP=$id")->with("message", $message);
        }
        DB::table('phases')->insert([
            'nomPhase' => $nomPhase,
            'durree' => $durree,
            'priorite' => $priorite,
            'idProjet' => $idProjet,
        ]);
        return view("projets/detail?id=$idP");
    }*/
    
    public function ajout()
    {
        return view('projets/phase');
    }
    public function ajouter()
    {
        // dd($_POST);
        $id = $_POST['idProjet'];
        $message = "Le ou les champs suivants n'ont pas été remplis :\t";
        if (empty($_POST)) {
            return view("projets/phase", ["message" => "Erreur d'enregistrement!","idP"=>$id]);
        }
        extract($_POST);
        if (empty($nomPhase)) {
            $message = $message . "Le nom de la phase,\t";
        }
        $jour = (empty($jour))?"0":$jour;
        $min = (empty($min))?"0":$min;
        $heure = (empty($heure))?"0":$heure;
        $durree = ((int)($jour))*24*60;
        $durree += ((int)($heure))*60;
        $durree += ((int)($min));
        if ($durree==0) {
            $message = $message . "La durree de la phase\t";
        }
        if ($message != "Le ou les champs suivants n'ont pas été remplis :\t") {
            return redirect("ajoutPhase?idP=$id")->with("message", $message);
        }
        DB::table('phases')->insert([
            'nomPhase' => $nomPhase,
            'durree' => $durree,
            'priorite' => $priorite,
            'idProjet' => $idProjet,
        ]);
        return redirect("detail?id=$id");
    }
}
