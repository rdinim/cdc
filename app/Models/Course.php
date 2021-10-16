<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory; //untuk import trait

    protected $table = 'ref.ms_unit';

    protected $connection = 'pgsql_ref';

    protected $primaryKey = 'idunit'; // add these if the primary key is not integer

    protected $fillable = [
        'idunit',
        'parentunit',
        'namaunit'

    ];

    protected $casts = [
        'idunit'=>'string'  // add these if the primary key is not integer
    ];

    public $incrementing = false; // add these if the primary key is not integer
    
    protected $keyType = 'string'; // add these if the primary key is not integer

    public function students()
    {
        return $this->belongsTo(Student::class, 'idunit', 'idunit');
    }
}
