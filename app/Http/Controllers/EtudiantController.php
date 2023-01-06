<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\TABLE7;
use App\Models\Université;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    public function verifiedInfos(Request $request)
    {
        if(Auth()->guest()){
            return redirect('login');
        } else {
            if($request->isMethod("POST")) {
                $univ = Université::find($request->universite);
                $infos = DB::table('TABLE 7')
                            ->where('matricule', $request->numMat)
                            ->where('universite', $univ->nom)
                            ->get();
            if ($infos->isEmpty()) {
                return redirect()->route('infos')->withErrors(["message" => "Cet matricule n'existe pas"]);
            } else {
                $infos = $infos[0];
                return view('infos', compact('infos'));
            }
                
            }
            $universites = Université::all();
            return view('verifiedInfos', compact('universites'));
        }
    }

    public function updateInfos(Request $request)
    {
        if(Auth()->guest()){
            return redirect('login');
        } else {
            if($request->isMethod("POST")) {
                $etu = DB::table('TABLE 7')->where(['matricule' => $request->numMatricule]);
                //dd($etu);
                $etu->update([
                    "nom" => $request->nom,
                    "prenom" => $request->prenom,
                    "dateNais" => $request->dateNais,
                    "lieuNais" => $request->lieuNais,
                    "sexe" => $request->sexe,
                    "dateIns" => $request->dateIns,
                    "filliereAnnee" => $request->filliereAnnee,
                    "RIB" => $request->RIB,
                    "banque" => $request->banque,
                    "retenue" => $request->retenue,
                    "anneeAcademique" => $request->anneeAcademique,
                    "intituléEtat" => $request->intituléEtat,
                    "debutEcheance" => $request->debutEcheance,
                    "finEcheance" => $request->finEcheance,
                ]);
                $infos = $etu;
                return redirect()->route('updateInfos')->withErrors(["message" => "Vos données on été bien mises à jour"]);
            }
            $universites = Université::all();
            return view('verifiedInfos', compact('universites'));
        }
    }

    //faireDemande
    public function faireDemande(Request $request)
    {
        if(Auth()->guest()){
            return redirect('login');
        } else {
            if($request->isMethod("POST")) {
                //dd($request);
                $univ = Université::find($request->universite);
                //dd($univ);
                $infos = DB::table('TABLE 7')
                            ->where('matricule', $request->numMat)
                            ->where('universite', $univ->nom)
                            ->get();
                if ($infos->isEmpty()) {
                    return redirect()->route('faireDemande')->withErrors(["message" => "Cet matricule n'existe pas"]);
                } else {
                    $infos = $infos[0];
                    return view('validerDemande', compact('infos'));
                }
            }
            $universites = Université::all();
            return view('faireDemande', compact('universites'));
        }
    }

    //finDemande
    public function finDemande(Request $request)
    {
        if($request->isMethod("POST")) {
            DB::table('demande')->insert([
                "matricule" => $request->numMatricule,
                "etat" => "Entraitement",
            ]);
            return redirect('/suivre_demande');
        }
    }

    //suivre_demande
    public function suivreDemande(Request $request)
    {
        if($request->isMethod("POST")) {
            //$univ = Demande::find($request->universite);
            $infos = DB::table('demande')
                        ->where('matricule', $request->numMat)
                        ->get();
            return view('infos1', compact('infos'));
        }
        $universites = Université::all();
        return view('suivreDemande', compact('universites'));
    }

    public function envoitresor(Request $request)
    {
        $infos = DB::table('demande')
                    ->where('etat', "Entraitement")
                    ->get();
        
        return view('valDemande1', compact('infos'));
    }

    public function statistiques(Request $request)
    {
        $statsentraitement = DB::table('demande')
                        ->select(DB::raw('count(*) as nbr1'))
                        ->where('etat', "Entraitement")
                        ->get();
        $statsentraitement = $statsentraitement[0]->nbr1;

        $statstraité = DB::table('demande')
                        ->select(DB::raw('count(*) as nbr1'))
                        ->where('etat', "valider")
                        ->get();
        $statstraité = $statstraité[0]->nbr1;

        
        $statsRejetés = DB::table('demande')
                        ->select(DB::raw('count(*) as nbr1'))
                        ->where('etat', "Rejetés")
                        ->get();
        $statsRejetés = $statsRejetés[0]->nbr1;
        
        return view('statistiques', compact('statsentraitement','statstraité','statsRejetés'));
    }

    //valDemande
    public function valDemande(Request $request)
    {
        $infos = DB::table('demande')
                    ->where('etat', "Entraitement")
                    ->get();
        
        return view('valDemande', compact('infos'));
    }

    //demandeV
    public function demandeV(Request $request)
    {
        $infos = DB::table('demande')
                    ->where('etat', '!=', "Entraitement")  
                    ->get();
        
        return view('demandesVal', compact('infos'));
    }

    //valider
    public function valider(Request $request,$id)
    {
        $etu = DB::table('demande')->where(['id' => $id]);
        $etu->update([
            "etat" => "valider",
            "dateV" => now()
        ]);

        return redirect('/demandeV');
    }

    //rejeter
    public function rejeter(Request $request,$id)
    {
        $etu = DB::table('demande')->where(['id' => $id]);
        $etu->update([
            "etat" => "Rejetés",
            "dateV" => now()
        ]);

        return redirect('/demandeV');
    }
}