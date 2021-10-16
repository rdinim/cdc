<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**

 * @package App\Models
 */
class EmploymentType extends Model
{
	protected $connection = 'pgsql';

	protected $table = 'employment_types';

    public $timestamps = false;

	protected $fillable = [
		'employment_type',
        'slug'
	];

	public function experiences()
	{
		return $this->hasMany(Experience::class, 'idemploymenttype');
	}
}
