<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property character varying|null $category
 * @property character varying|null $slug
 * 
 * @property Collection|Agenda[] $agendas
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $connection = 'pgsql';
	protected $table = 'categories';
	// public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'category',
		'slug'
	];

	public function agendas()
	{
		return $this->hasMany(Agenda::class, 'idcategory', 'id');
	}
}
