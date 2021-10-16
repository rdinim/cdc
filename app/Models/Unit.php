<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast; //??????

class Unit extends Model
{
    use HasFactory; //untuk import trait

    protected $connection = 'pgsql_gate';

    protected $table = 'sc_unit'; 

    protected $primaryKey = 'idsatker'; // add these if the primary key is not integer

    protected $casts = [
        'idsatker' => 'string', // add these if the primary key is not integer
        't_updatetime' => 'timestamp',
        'level' => 'int',
        'infoleft' => 'int',
        'inforight' => 'int',
        'proses' => 'int',
        'idunit' => 'int'
    ];

    public $incrementing = false; // add these if the primary key is not integer

    protected $keyType = 'string'; // add these if the primary key is not integer

    protected $fillable = [
        'idsatker',
        'namasatker',
        'namasingkat',
        'level',
        'infoleft',
        'inforight',
        't_updateuser',
        't_updatetime',
        't_updateip',
        't_updateact',
        'softdelete',
        'parentsatker',
        'proses',
        'idunit'
    ];

    public function users()
    {
        // format: belongstomany(Model, 'pivot-table', 'foreign key of current table', 'foreign key of joined table')->withPivot(['other columns of pivot table'])
        return $this->belongsToMany(User::class, 'sc_userrole', 'idsatker', 'userid')
            ->withPivot(['t_updateuser']);
    }

    public function roles()
    {
        // format: belongstomany(Model, 'pivot-table', 'foreign key of current table', 'foreign key of joined table')->withPivot(['other columns of pivot table'])
        return $this->belongsToMany(Role::class, 'sc_userrole', 'idsatker', 'idrole')
            ->withPivot(['t_updateuser']);
    }
}
