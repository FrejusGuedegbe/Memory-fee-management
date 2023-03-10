<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\TABLE7;
use App\Models\Universit√©;
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
                $univ = Universit√©::find($request->universite);
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
            $universites = Universit√©::all();
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
                    "intitul√©Etat" => $request->intitul√©Etat,
                    "debutEcheance" => $request->debutEcheance,
                    "finEcheance" => $request->finEcheance,
                ]);
                $infos = $etu;
                return redirect()->route('updateInfos')->withErrors(["message" => "Vos donn√©es on √©t√© bien mises √† jour"]);
            }
            $universites = Universit√©::all();
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
                $univ = Universit√©::find($request->universite);
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
            $universites = Universit√©::all();
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
        $universites = Universit√©::all();
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

        $statstrait√© = DB::table('demande')
                        ->select(DB::raw('count(*) as nbr1'))
                        ->where('etat', "valider")
                        ->get();
        $statstrait√© = $statstrait√©[0]->nbr1;

        
        $statsRejet√©s = DB::table('demande')
                        ->select(DB::raw('count(*) as nbr1'))
                        ->where('etat', "Rejet√©s")
                        ->get();
        $statsRejet√©s = $statsRejet√©s[0]->nbr1;
        
        return view('statistiques', compact('statsentraitement','statstrait√©','statsRejet√©s'));
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
            "etat" => "Rejet√©s",
            "dateV" => now()
        ]);

        return redirect('/demandeV');
    }
}