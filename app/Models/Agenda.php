<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agenda
 * 
 * @property int $id
 * @property int $idagendatype
 * @property int|null $idcategory
 * @property character varying|null $title
 * @property character varying|null $agendadesc
 * @property Carbon|null $schedule
 * @property character varying|null $flyer
 * @property character varying|null $slug
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Agendatype $agendatype
 * @property Category|null $category
 *
 * @package App\Models
 */
class Agenda extends Model
{
	use SoftDeletes;
	
	protected $table = 'agendas';

	protected $connection = 'mysql';

	// public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'idagendatype' => 'int',
		'idcategory' => 'int',
	];

	protected $dates = [
		'schedule'
	];

	protected $fillable = [
		'idagendatype',
		'idcategory',
		'title',
		'agendadesc',
		'schedule',
		'flyer',
		'slug',
		'created_by',
		'updated_by'
	];

	public function agendatype()
	{
		return $this->belongsTo(Agendatype::class, 'idagendatype', 'id');
	}

	public function category()
	{
		return $this->belongsTo(Category::class, 'idcategory', 'id');
	}

	public function creator()
	{
		return $this->belongsTo(User::class, 'created_by', 'id_pengguna');
	}

	public function editor()
	{
		return $this->belongsTo(User::class, 'updated_by', 'id_pengguna');
	}

	public function deleter()
	{
		return $this->belongsTo(User::class, 'deleted_by', 'id_pengguna');
	}
}
