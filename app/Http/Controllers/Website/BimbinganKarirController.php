<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Category;

use Illuminate\Http\Request;

class BimbinganKarirController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        $category = Category::get();
        $bimbingan_karir = Agenda::with([
            'category' => function($query){
                $query->select('id', 'category');
                }
            ])
            ->where('idagendatype','=','1')
            ->orderBy('created_at', 'desc')
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereHas('category', function ($query1) use ($request){
                    $query1->where('slug','=', $request->category);
                });
            })
            ->paginate(8);
        return view('website.layanan-bimbingan-karir', ['bimbingan_karir' => $bimbingan_karir,
                                                        'category' => $category]);
    }
}
