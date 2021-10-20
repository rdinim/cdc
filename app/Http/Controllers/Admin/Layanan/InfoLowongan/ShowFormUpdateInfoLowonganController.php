<?php

namespace App\Http\Controllers\Admin\Layanan\InfoLowongan;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Servicetype;
use App\Models\Company;
use App\Models\Jobposition;
use App\Models\Location;
use Illuminate\Http\Request;

class ShowFormUpdateInfoLowonganController extends Controller
{
    //
    public function __invoke(Service $info_lowongan)
    {
        $list_servicetype = Servicetype::get();
        $list_company = Company::get();
        $list_jobposition = Jobposition::get();
        $list_location = Location::with([
                            'cities'
                            ])
                            ->where('levelkota','=','0')->where('namakota','!=','Kosong')
                            ->get();
        return view('admin.layanan.info-lowongan.form', ['info_lowongan' => $info_lowongan, 
                                                         'servicetype' => $list_servicetype, 
                                                         'company' => $list_company,
                                                         'jobposition' => $list_jobposition,
                                                         'location' => $list_location]);
    }
}
