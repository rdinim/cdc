<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PtwGuide
 * 
 * @property int $id
 * @property character varying|null $title
 * @property character varying|null $file
 * @property character varying|null $slug
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 *
 * @package App\Models
 */
class PtwGuide extends Model
{
	protected $connection = 'pgsql';
	protected $table = 'ptw_guides';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'title',
		'file',
		'slug',
		'created_by',
		'updated_by'
	];

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
