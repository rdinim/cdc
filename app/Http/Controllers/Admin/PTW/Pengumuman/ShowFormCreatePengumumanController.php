<?php

namespace App\Http\Controllers\Admin\PTW\Pengumuman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowFormCreatePengumumanController extends Controller
{
    public function __invoke()
    {
        return view('admin.ptw.pengumuman.form');
    }
}
