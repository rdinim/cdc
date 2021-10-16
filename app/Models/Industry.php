<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**

 *
 * @package App\Models
 */
class Industry extends Model
{
	protected $connection = 'pgsql';

	protected $table = 'industries';

    public $timestamps = false;

	protected $fillable = [
		'industry',
        'slug'
	];

	public function experiences()
	{
		return $this->hasMany(Experience::class, 'idindustry','id');
	}
}
