<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Footer
 * 
 * @property int $id
 * @property int|null $parentid
 * @property int|null $ordernum
 * @property character varying|null $type
 * @property character varying|null $title
 * @property character varying|null $desc
 * @property character varying|null $url
 *
 * @package App\Models
 */
class Footer extends Model
{
	protected $connection = 'pgsql';

	protected $table = 'footers';

	// public $incrementing = false;
	
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'parentid' => 'int',
		'ordernum' => 'int',
	];

	protected $fillable = [
		'parentid',
		'ordernum',
		'type',
		'title',
		'desc',
		'url'
	];
}
