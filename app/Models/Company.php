<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property int $id
 * @property character varying|null $companyname
 * @property character varying|null $companydesc
 * @property character varying|null $logo
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * @property character varying|null $slug
 * 
 * @property Collection|Service[] $services
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $connection = 'pgsql';
	protected $table = 'companies';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int',
	];

	protected $fillable = [
		'companyname',
		'companydesc',
		'logo',
		'created_by',
		'updated_by',
		'slug'
	];

	public function services()
	{
		return $this->hasMany(Service::class, 'idcompany');
	}

	public function creator()
	{
		return $this->belongsTo(User::class, 'created_by', 'userid');
	}

	public function editor()
	{
		return $this->belongsTo(User::class, 'updated_by', 'userid');
	}

	public function deleter()
	{
		return $this->belongsTo(User::class, 'updated_by', 'userid');
	}
}
