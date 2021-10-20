<?php

namespace App\Http\Controllers\Admin\PTW\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
// use Illuminate\Http\Request;
use App\Http\Requests\PengumumanRequest;

class CreatePengumumanController extends Controller
{
    public function __invoke(PengumumanRequest $request)
    {
        $pengumuman = new Agenda;
        $pengumuman->idagenda = 2; //default id for pengumuman
        $pengumuman->title = $request->title;
        $pengumuman->agendadesc = $request->agendadesc;
        $pengumuman->schedule = $request->schedule;
        // $pengumuman->flyer = ;
        // $pengumuman->slug = $request->slug;
        $pengumuman->created_by = 1; //temporary
        $pengumuman->save();
        return redirect()->route('list-pengumuman');
    }
}
