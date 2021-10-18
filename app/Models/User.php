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
    protected $connection = 'pgsql_gate';

    protected $table = 'sc_user';

    protected $fillable = [
        'userid',
        'username',
        'password',
        'userdesc',
        'email',
        'hints',
        'isactive',
        'lastlogintime',
        'lastloginip',
        't_updateuser',
        't_updatetime',
        't_updateip',
        't_update_act',
        'softdelete',
        'salt',
        'tokenreset',
        'idpegawai',
        'tokenlogin'
    ];

    protected $primaryKey = 'userid';


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'userid' => 'int',
        't_updatetime' => 'timestamp',
        'idpegawai' => 'int'
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'nim', 'username');
    }

    public function roles()
    {
        // format: belongstomany(Model, 'pivot-table', 'foreign key of current table', 'foreign key of joined table')->withPivot(['other columns of pivot table'])
        return $this->belongsToMany(Role::class, 'sc_userrole', 'userid', 'idrole')
            ->withPivot(['t_updateuser']);
    }

    public function units()
    {
        // format: belongstomany(Model, 'pivot-table', 'foreign key of current table', 'foreign key of joined table')->withPivot(['other columns of pivot table'])
        return $this->belongsToMany(Unit::class, 'sc_userrole', 'userid', 'idsatker')
            ->withPivot(['t_updateuser']);
    }
}
