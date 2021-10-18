<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Media
 * 
 * @property int $id
 * @property int $idgallery
 * @property character varying|null $photo
 * @property character varying|null $photodesc
 * @property character varying|null $slug
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Gallery $gallery
 *
 * @package App\Models
 */
class Media extends Model
{
	protected $connection = 'pgsql';

	protected $table = 'medias';
	
	// public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'idgallery' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'idgallery',
		'photo',
		'photodesc',
		'slug',
		'created_by',
		'updated_by'
	];

	public function gallery()
	{
		return $this->belongsTo(Gallery::class, 'idgallery', 'id');
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
