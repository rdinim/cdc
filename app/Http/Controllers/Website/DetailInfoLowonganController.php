<?php

namespace App\Http\Controllers\Website; //namespace ini merupakan lokasi folder
use App\Http\Controllers\Controller;

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


class DetailInfoLowonganController extends Controller
{
    public function __invoke()
    {

        return view('website/detail-info-lowongan');
    }

        
}
