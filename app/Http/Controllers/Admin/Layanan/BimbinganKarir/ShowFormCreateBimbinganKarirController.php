<?php

namespace App\Http\Controllers\Admin\Layanan\BimbinganKarir;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowFormCreateBimbinganKarirController extends Controller
{
    public function __invoke()
    {
        //get all of category data for select input form bimbingan karir
        $list_category = Category::get();
        return view('admin.layanan.bimbingan-karir.form',['category' => $list_category]);
    }
}
