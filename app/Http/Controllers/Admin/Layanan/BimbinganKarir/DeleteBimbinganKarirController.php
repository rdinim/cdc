<?php

namespace App\Http\Controllers\Admin\Layanan\BimbinganKarir;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class DeleteBimbinganKarirController extends Controller
{
    //delete function
    public function __invoke(Agenda $bimbingan_karir)
    {
        $bimbingan_karir->deleted_by = 1;//temporary
        $bimbingan_karir->save();
        $bimbingan_karir->delete();
        return redirect()->route('list-bimbingan-karir');
    }
}
