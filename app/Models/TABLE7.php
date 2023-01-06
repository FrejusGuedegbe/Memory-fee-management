<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TABLE7
 * 
 * @property string|null $matricule
 * @property string|null $nom
 * @property string|null $prenom
 * @property string|null $dateNais
 * @property string|null $lieuNais
 * @property string|null $sexe
 * @property string|null $dateIns
 * @property string|null $universite
 * @property string|null $etablissement
 * @property string|null $filliereAnnee
 * @property string|null $tauxMensuel
 * @property string|null $typeAllocat
 * @property string|null $RIB
 * @property string|null $banque
 * @property string|null $montantNet
 * @property string|null $retenue
 * @property string|null $anneeAcademique
 * @property string|null $intituléEtat
 * @property string|null $debutEcheance
 * @property string|null $finEcheance
 *
 * @package App\Models
 */
class TABLE7 extends Model
{
	protected $table = 'TABLE 7';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'matricule',
		'nom',
		'prenom',
		'dateNais',
		'lieuNais',
		'sexe',
		'dateIns',
		'universite',
		'etablissement',
		'filliereAnnee',
		'tauxMensuel',
		'typeAllocat',
		'RIB',
		'banque',
		'montantNet',
		'retenue',
		'anneeAcademique',
		'intituléEtat',
		'debutEcheance',
		'finEcheance'
	];
}
