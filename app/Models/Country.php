<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory; //untuk import trait

    protected $table = 'ref.ms_negara';

    protected $connection = 'pgsql_ref';

    protected $primaryKey = 'idnegara'; // add these if the primary key is not integer

    protected $fillable = [
        'idnegara', 
        'namanegara'
    ];

    protected $casts = [
        'idnegara'=>'string'  // add these if the primary key is not integer
    ];

    public $incrementing = false; // add these if the primary key is not integer
    
    protected $keyType = 'string'; // add these if the primary key is not integer

    public function students()
    {
        return $this->hasMany(Student::class, 'idnegara', 'idnegara');
    }
}
