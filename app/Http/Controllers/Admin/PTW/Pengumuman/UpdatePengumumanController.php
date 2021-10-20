<?php

namespace App\Http\Controllers\Admin\PTW\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
// use Illuminate\Http\Request;
use App\Http\Requests\PengumumanRequest;

class UpdatePengumumanController extends Controller
{
    public function __invoke(Agenda $pengumuman, PengumumanRequest $request)
    {
        // dd($request->all());
        $pengumuman->title = $request->title;
        $pengumuman->agendadesc = $request->agendadesc;
        $pengumuman->schedule = $request->schedule;
        // $pengumuman->flyer = ;
        // $pengumuman->slug = $request->slug;
        $pengumuman->updated_by = 1; //temporary
        $pengumuman->save();
        // jika yg diupdate semua atribut di tabel agendas (isi request kita=atribut di model Agenda)
        // $pengumuman->update($request->all());
        return redirect()->route('list-pengumuman');
    }
}
