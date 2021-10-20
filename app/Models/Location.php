<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory; //untuk import trait

    // define connection (schema ref)
    protected $connection = 'pgsql_ref';

    protected $table = 'ref.lv_kota';

    protected $casts = [
        'idkota' => 'int',
    ];
    
    protected $fillable = [
        'parentkota',
        'namakota',
        'levelkota',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'idjoblocation','idkota');

    }

    public function students()
    {
        return $this->hasMany(Student::class, 'idkota', 'idkota');
    }

    public function cities()
    {
        return $this->hasMany(Location::class, 'parentkota', 'idkota');
    }

    public function province()
    {
        return $this->belongsTo(Location::class, 'parentkota', 'idkota');
    }
    
}
