<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Demande
 * 
 * @property int $id
 * @property string $matricule
 * @property int $université
 * @property string $type
 * @property Carbon $datet
 *
 * @package App\Models
 */
class Demande extends Model
{
	protected $table = 'Demande';
	public $timestamps = false;

	protected $casts = [
		'université' => 'int'
	];

	protected $dates = [
		'datet'
	];

	protected $fillable = [
		'matricule',
		'université',
		'type',
		'datet'
	];
}
