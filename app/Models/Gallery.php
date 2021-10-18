<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gallery
 * 
 * @property int $id
 * @property character varying|null $title
 * @property character varying|null $gallerydesc
 * @property bool|null $ispublic
 * @property character varying|null $slug
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Collection|Media[] $media
 *
 * @package App\Models
 */
class Gallery extends Model
{
	protected $connection = 'pgsql';
	protected $table = 'galleries';
	// public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'ispublic' => 'bool',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'title',
		'gallerydesc',
		'ispublic',
		'slug',
		'created_by',
		'updated_by'
	];

	public function medias()
	{
		return $this->hasMany(Media::class, 'idgallery','id');
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
