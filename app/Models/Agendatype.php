<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Agendatype
 * 
 * @property int $id
 * @property character varying|null $agendatype
 * @property character varying|null $slug
 * 
 * @property Collection|Agenda[] $agendas
 *
 * @package App\Models
 */
class Agendatype extends Model
{
	protected $connection = 'pgsql';

	protected $table = 'agendatypes';

	// public $incrementing = false;
	
	public $timestamps = false;

	protected $fillable = [
		'agendatype',
		'slug'
	];

	public function agendas()
	{
		return $this->hasMany(Agenda::class, 'idagenda', 'id');
	}
}
