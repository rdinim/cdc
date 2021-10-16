<?php

namespace App\Http\Controllers; //namespace ini merupakan lokasi folder

use Illuminate\Http\Request;

class WelcomeController extends Controller // WelcomeController adalah anak dari Controller, semua fungsi dan atribut yg ada di Controller akan ada di Welcome Controller. kecuali yg private.
{
    public function welcome ()
    {
        return view('welcome');
    }
}
