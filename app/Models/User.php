<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable;


class User extends AuthenticatableUser implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $connection = 'mysql_man_akses';

    protected $table = 'pengguna';

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id_pengguna' => 'string', // add these if the primary key is not integer
        'soft_delete' => 'int'
    ];
    public $incrementing = false; // add these if the primary key is not integer
    
    protected $keyType = 'string'; // add these if the primary key is not integer

    protected $fillable = [
        'id_pengguna',
        'username',
        'password',
        'nm_pengguna',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'no_tel',
        'no_hp',
        'approval_pengguna',
        'a_aktif',
        'tgl_ganti_pwd',
        'id_sdm_pengguna',
        'id_wil',
        'id_pd_pengguna',
        'last_update',
        'sotf_delete',
        'last_sync',
        'id_updater',
        'csf',
        'id_pegawai',
        'bann',
        'email',
        'foto_moodle',
        'moodle',
    ];

    protected $date = [
        'tgl_lahir',
        'tgl_ganti_pwd'
    ];

    protected $primaryKey = 'id_pengguna';


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // public function student()
    // {
    //     return $this->hasOne(Student::class, 'nim', 'username');
    // }

    public function graduate()
    {
        return $this->hasOne(Graduate::class, 'id_pd', 'id_pd_pengguna');
    }

    // public function units()
    // {
    //     // format: belongstomany(Model, 'pivot-table', 'foreign key of current table', 'foreign key of joined table')->withPivot(['other columns of pivot table'])
    //     return $this->belongsToMany(Unit::class, 'sc_userrole', 'id_pengguna', 'idsatker')
    //         ->withPivot(['t_updateuser']);
    // }
}
