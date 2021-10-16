<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory; //untuk import trait

    protected $table = 'ref.lv_agama';

    protected $connection = 'pgsql_ref';

    protected $fillable = [
        'idagama', 
        'namaagama'
    ];

    protected $casts = [
        'idagama'=>'int'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'idagama', 'idagama');
    }
}
