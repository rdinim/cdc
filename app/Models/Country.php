<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory; //untuk import trait

    protected $table = 'negara';

    protected $connection = 'mysql_ref';

    protected $primaryKey = 'id_negara'; // add these if the primary key is not integer

    protected $fillable = [
        'id_negara', 
        'nm_negara'
    ];

    protected $casts = [
        'id_negara'=>'string'  // add these if the primary key is not integer
    ];

    public $incrementing = false; // add these if the primary key is not integer
    
    protected $keyType = 'string'; // add these if the primary key is not integer

    public function students()
    {
        return $this->hasMany(Student::class, 'kewarganegaraan', 'id_negara');
    }
}
