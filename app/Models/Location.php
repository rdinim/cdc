<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory; //untuk import trait

    // define connection (schema ref)
    protected $connection = 'mysql_ref';

    protected $table = 'wilayah';

    protected $casts = [
        'id' => 'int',
    ];
    
    protected $fillable = [
        'id_wil',
        'id_negara',
        'nm_wil',
        'id_level_wil',
        'id_induk_wilayah',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'idjoblocation','id_wil');

    }

    public function students()
    {
        return $this->hasMany(Student::class, 'id_wil', 'id_wil');
    }

    public function cities()
    {
        return $this->hasMany(Location::class, 'id_induk_wilayah', 'id_wil');
    }

    public function province()
    {
        return $this->belongsTo(Location::class, 'id_induk_wilayah', 'id_wil');
    }
    
}
