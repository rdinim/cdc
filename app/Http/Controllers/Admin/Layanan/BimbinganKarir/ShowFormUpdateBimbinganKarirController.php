<?php

namespace App\Http\Controllers\Admin\Layanan\BimbinganKarir;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ShowFormUpdateBimbinganKarirController extends Controller
{
    //do your logic
    public function __invoke(Agenda $bimbingan_karir)
    {
        // dd($bimbingan_karir);
        //get all of category data for select input form bimbingan karir
        $list_category = Category::get();
        // if (!empty($bimbingan_karir->flyer)) {
        //     $filePath = public_path().'/storage/'.$bimbingan_karir->flyer;
        //     $pathinfo = pathinfo($filePath);

        //     $bimbingan_karir->file = new UploadedFile($filePath, $pathinfo['filename']);
        // }
        // // dd($bimbingan_karir);
        return view('admin.layanan.bimbingan-karir.form', ['bimbingan_karir' => $bimbingan_karir, 'category' => $list_category]);
    }
}
