<?php

namespace App\Http\Controllers\Alumni\Kuesioner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class ShowFormKuesionerController extends Controller
{
    public function __invoke()
    {
        // dd(old('kerjapertama1'));
        // ambil sections
        $kuesioner = Question::with([
            'childquestions' => function($query2) { // ambil pertanyaan
                $query2->select('id','question','questiontype','questionparent', 'isrequired','desc', 'name')
                    ->with([
                        'childquestions',   // ambil pertanyaan dg radio button
                        'childquestions.choices' // pilihan dari pertanyaan radio button
                    ]);
            },
            'childquestions.choices' => function ($query) { // pilihan dari pertanyaan
                $query->select('id','choice','idnextquestion','idquestion', 'name');
            }
        ])
        ->whereNull('questionparent')
        ->get();
        // dd($kuesioner->toArray());
        return view('alumni.kuesioner.form',['kuesioner' => $kuesioner]);
    }
}