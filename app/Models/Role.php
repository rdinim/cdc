<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory; //untuk import trait

    // define connection (schema gate)
    protected $connection = 'pgsql_gate';

    // define table name
    protected $table = 'sc_role';

    protected $primaryKey = 'idrole';

    protected $casts = [
        'idrole' => 'string',
        't_updatetime' => 'timestamp',
        'levelcp' => 'int'
    ];

    public $incrementing = false;

    protected $keyType = 'string';
    
    protected $fillable = [
        'idrole',
        'namarole',
        't_updateuser',
        't_updatetime',
        't_updateip',
        'softdelete',
        'levelcp'
    ];

    public function users()
    {
        // format: belongstomany(Model, 'pivot-table', 'foreign key of current table', 'foreign key of joined table')->withPivot(['other columns of pivot table'])
        return $this->belongsToMany(User::class, 'sc_userrole', 'idrole', 'userid')
            ->withPivot(['t_updateuser']);
    }

    public function units()
    {
        // format: belongstomany(Model, 'pivot-table', 'foreign key of current table', 'foreign key of joined table')->withPivot(['other columns of pivot table'])
        return $this->belongsToMany(Unit::class, 'sc_userrole', 'idrole', 'idsatker')
            ->withPivot(['t_updateuser']);
    }
    
}
