<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 */
class Experience extends Model
{
	protected $table = 'experiences';

	protected $connection = 'pgsql';

	// public $incrementing = false;

	protected $casts = [
        'id' => 'int',
		'idemploymenttype' => 'int',
        'idlocation' => 'int',
        'idindustry' => 'int',
        'created_by' => 'int',
        'updated_by' => 'int'
	];

	protected $dates = [
		'start_date',
        'end_date'
	];

	protected $fillable = [
		'nim',
        'title',
        'idemploymenttype',
        'companyname',
        'idlocation',
        'start_date',
        'end_date',
        'idindustry',
        'desc',
        'slug',
        'created_by',
        'updated_by'
	];

	public function student()
	{
		return $this->belongsTo(Student::class, 'nim','nim');
	}

	public function employment_type()
	{
		return $this->belongsTo(EmploymentType::class, 'idemploymenttype', 'id');
	}

	public function industry()
	{
		return $this->belongsTo(Industry::class, 'idindutry','id');
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
