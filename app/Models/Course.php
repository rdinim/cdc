<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory; //untuk import trait

    protected $table = 'sms';

    protected $connection = 'mysql_ref';

    protected $primaryKey = 'id_sms'; // add these if the primary key is not integer

    protected $fillable = [
        'id_sms',
        'nm_lemb',
    ];

    protected $casts = [
        'id_sms'=>'string'  // add these if the primary key is not integer
    ];

    public $incrementing = false; // add these if the primary key is not integer
    
    protected $keyType = 'string'; // add these if the primary key is not integer

    public function students()
    {
        return $this->belongsTo(Student::class, 'id_sms', 'id_sms');
    }
}
