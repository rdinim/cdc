<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $connection = 'mysql';

	protected $table = 'answers';
	
	public $incrementing = false;

	protected $casts = [
		'idquestion' => 'int',
	];

	protected $fillable = [
		'idstudent',
		'idquestion',
		'answer',
		'created_by',
		'updated_by'
	];
}
