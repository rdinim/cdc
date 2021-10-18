<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast; //?????

class UserRole extends Model
{
    use HasFactory; //untuk import trait

    protected $connection = 'pgsql_gate';
    
    protected $table = 'sc_userrole';

    protected $fillable = [
        'idrole',
        'userid',
        'idsatker',
        't_updateuser',
        't_updatetime',
        't_updateip',
        't_updateact',
        'softdelete'
    ];
    
    protected $casts = [
        'userid'=> 'int',
        'idrole'=> 'string',
        't_updatetime' => 'timestamp' 
    ];

}