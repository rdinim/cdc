<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Company;
use App\Models\Jobposition;
use App\Models\Location;

use Illuminate\Http\Request;

class InfoLowonganController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        $company = Company::get();
        $jobposition = Jobposition::get();

        $location = Location::with(['cities'])
            ->where('id_level_wil','=','1')
            ->get();

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
        ])
        ->orderBy('created_at', 'desc')
        ->when($request->filled('title'), function ($query) use ($request) {
            $query->where('title', 'ilike', '%'.$request->title.'%');           
        })
        ->when($request->filled('company'), function ($query) use ($request) {
            $query->whereHas('company', function ($query1) use ($request){
                $query1->where('slug','=', $request->company);
            });
        })
        ->when($request->filled('idjoblocation'), function ($query) use ($request) {
                $query->where('idjoblocation','=', $request->idjoblocation);
        })
        ->when($request->filled('jobposition'), function ($query) use ($request) {
            $query->whereHas('jobposition', function ($query1) use ($request){
                $query1->where('slug','=', $request->jobposition);
            });
        })
        ->paginate(9);
        return view('website.layanan-info-lowongan', ['info_lowongan' => $info_lowongan, 
                                                      'company' => $company,
                                                      'jobposition' => $jobposition,
                                                      'location' => $location]);
    }
}
