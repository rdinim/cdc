<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Header
 * 
 * @property int $id
 * @property character varying|null $title
 * @property character varying|null $url
 * @property int|null $parentid
 * @property character varying|null $media_url
 * @property int|null $ordernum
 *
 * @package App\Models
 */
class Header extends Model
{
	protected $connection = 'pgsql';

	protected $table = 'headers';

	// public $incrementing = false;

	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'parentid' => 'int',
		'ordernum' => 'int'
	];

	protected $fillable = [
		'title',
		'url',
		'parentid',
		'media_url',
		'ordernum'
	];
}
