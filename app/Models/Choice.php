<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Choice
 * 
 * @property int $id
 * @property int $idquestion
 * @property character varying|null $choice
 * @property character varying|null $slug
 * 
 * @property Question $question
 *
 * @package App\Models
 */
class Choice extends Model
{
	protected $connection = 'pgsql';

	protected $table = 'choices';

	// public $incrementing = false;
	
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idquestion' => 'int',
	];

	protected $fillable = [
		'idquestion',
		'choice',
		'slug'
	];

	public function question()
	{
		return $this->belongsTo(Question::class, 'idquestion', 'id');
	}
}
