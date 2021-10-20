<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Service
 * 
 * @property int $id
 * @property int $idservicetype
 * @property int $idcompany
 * @property int $idjobposition
 * @property int $idjoblocation
 * @property character varying|null $desc
 * @property Carbon|null $openingdate
 * @property Carbon|null $closingdate
 * @property character varying|null $address
 * @property character varying|null $flyer
 * @property character varying|null $slug
 * @property Carbon|null $created_at
 * @property int|null $created_by
 * @property Carbon|null $updated_at
 * @property int|null $updated_by
 * 
 * @property Servicetype $servicetype
 * @property Company $company
 * @property Jobposition $jobposition
 *
 * @package App\Models
 */
class Service extends Model
{
	use SoftDeletes;

	protected $connection = 'pgsql';

	protected $table = 'services';
	
	// public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'idservicetype' => 'int',
		'idcompany' => 'int',
		'idjobposition' => 'int',
		'idjoblocation' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $dates = [
		'openingdate',
		'closingdate'
	];

	protected $fillable = [
		'idservicetype',
		'idcompany',
		'idjobposition',
		'idjoblocation',
		'desc',
		'openingdate',
		'closingdate',
		'address',
		'flyer',
		'slug',
		'created_by',
		'updated_by'
	];

	public function servicetype()
	{
		return $this->belongsTo(Servicetype::class, 'idservicetype','id');
	}

	public function company()
	{
		return $this->belongsTo(Company::class, 'idcompany','id');
	}

	public function jobposition()
	{
		return $this->belongsTo(Jobposition::class, 'idjobposition','id');
	}

    public function location()
    {
        return $this->belongsTo(Location::class, 'idjoblocation','idkota');

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
