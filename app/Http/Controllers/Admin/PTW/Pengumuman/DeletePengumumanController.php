<?php

namespace App\Http\Controllers\Admin\PTW\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class DeletePengumumanController extends Controller
{
    //delete function
    public function __invoke(Agenda $pengumuman)
    {
        $pengumuman->deleted_by = 1;//temporary
        $pengumuman->save();
        $pengumuman->delete();
        return redirect()->route('list-pengumuman');
    }
}
