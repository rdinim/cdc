<?php

namespace App\Http\Controllers\Admin\Layanan\BimbinganKarir;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class ShowListBimbinganKarirController extends Controller
{
    //do the logic
    public function __invoke()
    {
        //get all of bimbingan karir data
        $bimbingan_karir = Agenda::with([
            'agendatype' => function($query){
                $query->select('id','agendatype');
            },
            'category' => function($query2){
                $query2->select('id','category');
            },
            'creator' => function($query3){
                $query3->select('userid','userdesc');
            },
            'editor' => function($query4){
                $query4->select('userid','userdesc');
            },
            'deleter' => function($query4){
                $query4->select('userid','userdesc');
            }
        ])
        ->where('idagenda','=','1')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('admin.layanan.bimbingan-karir.list',['bimbingan_karir' => $bimbingan_karir] );
    }
}
