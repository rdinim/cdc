<?php

namespace App\Http\Controllers\Admin\Layanan\InfoLowongan;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class DeleteInfoLowonganController extends Controller
{
    //
    public function __invoke(Service $info_lowongan)
    {
        $info_lowongan->deleted_by = 1;//temporary
        $info_lowongan->save();
        $info_lowongan->delete();
        return redirect()->route('list-info-lowongan');
    }
}
