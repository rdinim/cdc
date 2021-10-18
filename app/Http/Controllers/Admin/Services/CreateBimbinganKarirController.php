<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class CreateBimbinganKarirController extends Controller
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
            }
        ])
        ->select('idagenda','idcategory','title','agendadesc','schedule')
        ->where('idagenda','=','1')
        ->get();
        return view('admin.services.list-bimbingan-karir',['bimbingan_karir' => $bimbingan_karir] );
    }
}
