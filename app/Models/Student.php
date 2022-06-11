<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory; //untuk import trait

    protected $connection = 'mysql_public';

    protected $table = 'peserta_didik';

    protected $primaryKey = 'id_pd'; // add these if the primary key is not integer

    
    protected $casts = [
        'id_pd' => 'string', // add these if the primary key is not integer
        'rt' => 'int',
        'rw' => 'int',
    ];
    public $incrementing = false; // add these if the primary key is not integer
    
    protected $keyType = 'string'; // add these if the primary key is not integer

    protected $fillable = [
        'id_pd',
        'nm_pd', //nama peserta didik
        'jk', //jenis kelamin
        'jln', //nama jalan (alamat)
        'rt',
        'rw',
        'nm_dsn',
        'ds_kel',
        'kode_pos',
        'nik',
        'tmpt_lahir',
        'tgl_lahir',
        'no_hp',
        'email',
        'id_wil', //foreign key wilayah
        'id_agama', //foreign key agama
        'kewarganegaraan',
        'last_update',
        'soft_delete',
        'id_updater',
    ];

    protected $date = [
        'tgl_lahir'
    ];

    public function questions()
    {
        // format: belongstomany(Model, 'pivot-table', 'foreign key of current table', 'foreign key of joined table')->withPivot(['other columns of pivot table'])
        return $this->belongsToMany(Question::class, 'answers', 'idstudent', 'idquestion')
            ->withPivot(['answer']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nim', 'username');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class, 'idagama', 'idagama');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'idunit', 'idunit');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'id_wil', 'id_wil');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'idnegara', 'idnegara');
    }

    public function experiences()
	{
		return $this->hasMany(Experience::class, 'nim','nim');
	}

}

