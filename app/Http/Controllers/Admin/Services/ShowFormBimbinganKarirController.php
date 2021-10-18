<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowFormBimbinganKarirController extends Controller
{
    public function __invoke()
    {
        return view('admin.services.form-bimbingan-karir');
    }
}
