<?php

namespace App\Http\Controllers\Admin\PTW\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class ShowFormUpdatePengumumanController extends Controller
{
    public function __invoke(Agenda $pengumuman)
    {
        return view('admin.ptw.pengumuman.form', ['pengumuman' => $pengumuman]);
    }
}
