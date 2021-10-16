<?php

namespace App\Http\Controllers; //namespace ini merupakan lokasi folder

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Agendatype;
use App\Models\Category;
use App\Models\Service;
use App\Models\Servicetype;
use App\Models\Company;
use App\Models\Jobposition;
use App\Models\Location;
use App\Models\Gallery;
use App\Models\Media;
use App\Models\PtwGuide;
use App\Models\Student;
use App\Models\Question;
use App\Models\Choice;
use App\Models\Answer;
use App\Models\User;
use App\Models\Unit;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Religion;
use App\Models\Country;
use App\Models\Course;
use App\Models\EmploymentType;
use App\Models\Experience;
use App\Models\Industry;






class CekController extends Controller
{
    public function cek()
    {
        // $list_agenda = Industry::get(); // get all data
        // return $list_agenda;

        // $show_model = Agenda::with([
        //     'agendatype' => function($query){
        //         $query->select('id','agendatype');
        //     },
        //     'category' => function($query2){
        //         $query2->select('id','category');
        //     }
        // ])
        // ->select('idagenda','idcategory','title','agendadesc','schedule')
        // ->get(); //query yang melibatkan relasi

        // $show_model=Experience::with([
        //     'employment_type'
        //     // 'student'=> function ($query) {
        //     //     $query->select('nim', 'nama');
        //     // },
        //     // 'employment_type'=> function ($query) {
        //     //     $query->select('id','employment_type');
        //     // },
        //     // 'industry'=> function ($query) {
        //     //     $query->select('id','industry');
        //     // }
        // ])
        // ->first();
        $show_model = Experience::with([
            'employment_type'
        ])->get();

        return $show_model;

        // $list_pengisi = User::with([
        //     'units'=> function ($query) { 
        //         $query->select('sc_unit.idsatker', 'namasatker');
        //     },
        //     'roles'=> function ($query) { 
        //         $query->select('sc_role.idrole', 'namarole');
        //     }
        // ])
        // ->select('userid','userdesc')
        // ->get();
        // return $list_pengisi;
    }
}
