<?php

namespace App\Http\Controllers\Admin\PTW\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class ShowListPengumumanController extends Controller
{
    public function __invoke()
    {
        //get all of pengumuman data
     $pengumuman = Agenda::with([
        'agendatype' => function($query){
            $query->select('id','agendatype');
        },
        'creator' => function($query2){
            $query2->select('userid','userdesc');
        },
        'editor' => function($query3){
            $query3->select('userid','userdesc');
        },
        'deleter' => function($query4){
            $query4->select('userid','userdesc');
        }
    ])
    ->where('idagenda','=','2')
    ->orderBy('schedule', 'desc')
    ->get();

    return view('admin.ptw.pengumuman.list',['pengumuman' => $pengumuman] );
    }
}
