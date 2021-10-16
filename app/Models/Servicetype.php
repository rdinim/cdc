<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicetype
 * 
 * @property int $id
 * @property character varying|null $servicetype
 * @property character varying|null $slug
 * 
 * @property Collection|Service[] $services
 *
 * @package App\Models
 */
class Servicetype extends Model
{
	protected $connection = 'pgsql';
	protected $table = 'servicetypes';
	// public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'servicetype',
		'slug'
	];

	public function services()
	{
		return $this->hasMany(Service::class, 'idservicetype');
	}
}
