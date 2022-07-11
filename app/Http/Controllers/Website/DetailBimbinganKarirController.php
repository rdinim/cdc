<?php

namespace App\Http\Controllers\Website; //namespace ini merupakan lokasi folder
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;



class DetailBimbinganKarirController extends Controller
{
    public function __invoke(Agenda $bimbingan_karir)
    {
        $categoryname = Category::where('id', '=', $bimbingan_karir->idcategory)->get('category');
        // dd($categoryname->toArray());
        return view('website/detail-bimbingan-karir', ['bimbingan_karir'=> $bimbingan_karir, 'categoryname'=> $categoryname]);
    }

        
}
