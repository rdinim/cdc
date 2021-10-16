<?php

namespace App\Models;

//use = import
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory; //untuk import trait

    protected $table = 'akademik.ak_mahasiswa';

    protected $connection = 'pgsql_akademik';

    protected $primaryKey = 'nim'; // add these if the primary key is not integer

    
    protected $casts = [
        'nim' => 'string', // add these if the primary key is not integer
        'idagama' => 'int',
        'idkota' => 'int',
    ];
    public $incrementing = false; // add these if the primary key is not integer
    
    protected $keyType = 'string'; // add these if the primary key is not integer

    protected $fillable = [
        'nim',
        'idjenistinggal',
        'idperiode',
        'idagama',
        'idnegara',
        'idsistemkuliah',
        'idkurikulum',
        'idjalurpendaftaran',
        'idunit',
        'idstatusmhs',
        'idbs',
        'idgelombang',
        'idkota',
        'idpenghasilan',
        'idtransport',
        'idpekerjaan',
        'nama',
        'alamat',
        'telepon',
        'hp',
        'tmplahir',
        'tgllahir',
        'kodepos',
        'jk',
        'gelardepan',
        'gelarbelakang',
        'goldarah',
        'email',
        'nik',
        'nokk',
        'rt',
        'rw',
        'dusun',
        'desa',
        't_updateuser',
        't_updatetime',
        't_updateip',
        't_updateact',
        'softdelete',
    ];

    protected $date = [
        'tgllahir'
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
        return $this->belongsTo(Location::class, 'idkota', 'idkota');
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

