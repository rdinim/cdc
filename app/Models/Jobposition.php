<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Jobposition
 * 
 * @property int $id
 * @property character varying|null $position
 * @property character varying|null $slug
 * 
 * @property Collection|Service[] $services
 *
 * @package App\Models
 */
class Jobposition extends Model
{
	protected $connection = 'pgsql';
	protected $table = 'jobpositions';
	// public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'position',
		'slug'
	];

	public function services()
	{
		return $this->hasMany(Service::class, 'idjobposition');
	}
}
