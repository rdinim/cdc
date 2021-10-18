<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * 
 * @property character varying $idstudent
 * @property int $idquestion
 * @property character varying|null $answer
 * @property character varying|null $slug
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Question $question
 *
 * @package App\Models
 */
class Answer extends Model
{
	protected $connection = 'pgsql';

	protected $table = 'answers';
	
	public $incrementing = false;

	protected $casts = [
		'idquestion' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'idstudent',
		'idquestion',
		'answer',
		'slug',
		'created_by',
		'updated_by'
	];

	public function question()
	{
		return $this->belongsTo(Question::class, 'idquestion');
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
