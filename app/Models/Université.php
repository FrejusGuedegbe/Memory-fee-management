<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Université
 * 
 * @property int $id
 * @property string $nom
 *
 * @package App\Models
 */
class Université extends Model
{
	protected $table = 'Université';
	public $timestamps = false;

	protected $fillable = [
		'nom'
	];
}
