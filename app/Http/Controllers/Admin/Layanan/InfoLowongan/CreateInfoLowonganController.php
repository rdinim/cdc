<?php

namespace App\Http\Controllers\Admin\Layanan\InfoLowongan;

use App\Http\Controllers\Controller;
use App\Models\Service;
// use Illuminate\Http\Request;
use App\Http\Requests\InfoLowonganRequest;

class CreateInfoLowonganController extends Controller
{
    //
    public function __invoke(InfoLowonganRequest $request)
    {
        $info_lowongan = new Service;
        $info_lowongan->idservicetype = $request->idservicetype;
        $info_lowongan->idcompany = $request->idcompany;
        $info_lowongan->idjobposition = $request->idjobposition;
        $info_lowongan->idjoblocation = $request->idjoblocation;
        $info_lowongan->title = $request->title;
        $info_lowongan->desc = $request->desc;
        $info_lowongan->openingdate = $request->openingdate;
        $info_lowongan->closingdate = $request->closingdate;
        $info_lowongan->address = $request->address;
        // $info_lowongan->flyer = $request->flyer;
        $info_lowongan->created_by = 1;
        $info_lowongan->save();
        return redirect()->route('list-info-lowongan');
    }
}
