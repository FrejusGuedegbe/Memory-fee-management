<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Universit√©
 * 
 * @property int $id
 * @property string $nom
 *
 * @package App\Models
 */
class Universit√© extends Model
{
	protected $table = 'Universit√©';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];
}
