<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    use HasFactory; //untuk import trait

    protected $connection = 'mysql_public';

    protected $table = 'reg_pd';

    protected $primaryKey = 'id_reg_pd'; // add these if the primary key is not integer

    
    protected $casts = [
        'id_reg_pd' => 'string', // add these if the primary key is not integer
    ];
    public $incrementing = false; // add these if the primary key is not integer
    
    protected $keyType = 'string'; // add these if the primary key is not integer

    protected $fillable = [
        'id_reg_pd',
        'id_pd',
        'id_sp',
        'id_sms',
        'nipd',
        'tgl_masuk_sp',
        'tgl_keluar',
        'ket',
        'skhun',
        'ipk',
        'id_jns_keluar',
        'id_jalur_masuk',
        'id_updater',
        'slug',
    ];

    protected $date = [
        'tgl_masuk_sp',
        'tgl_keluar'
    ];
}

