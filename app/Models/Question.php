<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * 
 * @property int $id
 * @property character varying|null $question
 * @property character varying|null $questiontype
 * @property character varying|null $questionparent
 * @property bool|null $isrequired
 * @property character varying|null $slug
 * 
 * @property Collection|Choice[] $choices
 * @property Answer $answer
 *
 * @package App\Models
 */
class Question extends Model
{
	protected $connection = 'pgsql';

	protected $table = 'questions';

	// public $incrementing = false;
	
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'isrequired' => 'bool'
	];

	protected $fillable = [
		'question',
		'questiontype',
		'questionparent',
		'isrequired',
		'slug'
	];

	//relationship function

	public function choices()
	{
		return $this->hasMany(Choice::class, 'idquestion', 'id');
	}

	public function questions()
    {
        // format: belongstomany(Model, 'pivot-table', 'foreign key of current table', 'foreign key of joined table')->withPivot(['other columns of pivot table'])
        return $this->belongsToMany(Student::class, 'answers', 'idquestion', 'idstudent')
            ->withPivot(['answer']);
    }
}
