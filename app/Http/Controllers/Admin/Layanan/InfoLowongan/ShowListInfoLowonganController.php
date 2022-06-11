<?php

namespace App\Http\Controllers\Admin\Layanan\InfoLowongan;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Servicetype;
use App\Models\Company;
use App\Models\Jobposition;
use App\Models\Location;
use Illuminate\Http\Request;

class ShowListInfoLowonganController extends Controller
{
    
    public function __invoke(Request $request)
    {
        //get data for filter
        $list_servicetype = Servicetype::get();
        $list_company = Company::get();
        $list_jobposition = Jobposition::get();
        $list_location = Location::with([
                            'cities'
                        ])
                        ->where('id_level_wil','=','1')
                        ->get();

        //get all of info lowongan data
        $info_lowongan = Service::with([
            'servicetype' => function($query){
                $query->select('id', 'servicetype');
            },
            'company' => function($query){
                $query->select('id', 'companyname', 'companydesc', 'logo');
            },
            'jobposition' => function($query){
                $query->select('id', 'position');
            },
            'location' => function($query){
                $query->select('id_wil', 'nm_wil');
            },
            'creator' => function($query2){
                $query2->select('id_pengguna','nm_pengguna');
            },
            'editor' => function($query3){
                $query3->select('id_pengguna','nm_pengguna');
            },
            'deleter' => function($query4){
                $query4->select('id_pengguna','nm_pengguna');
            }
        ])
        ->orderBy('created_at', 'desc')
        ->when($request->filled('title'), function ($query) use ($request) {
            $query->where('title', 'ilike', '%'.$request->title.'%');           
        })
        ->get();
        
        return view('admin.layanan.info-lowongan.list', ['info_lowongan' => $info_lowongan, 
                                                         'servicetype' => $list_servicetype, 
                                                         'company' => $list_company,
                                                         'jobposition' => $list_jobposition,
                                                         'location' => $list_location]);
    }
}
