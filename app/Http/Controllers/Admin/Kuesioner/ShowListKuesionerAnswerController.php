<?php

namespace App\Http\Controllers\Admin\Kuesioner;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;

class ShowListKuesionerAnswerController extends Controller
{
    //do the logic
    public function __invoke()
    {
        //get all of bimbingan karir data
        $kuesioner = Question::whereIn('question',array('Tahun Lulus', 'Program Studi', 'NIT', 'Nomor Handphone ', 'Email'))
        ->pluck('id');

        $jawaban_kuesioner = Answer::whereIn('idquestion', $kuesioner)
        ->get();

        dd($jawaban_kuesioner->toArray());

        return view('admin.kuesioner.list-kuesioner-answer',['jawaban_kuesioner' => $jawaban_kuesioner] );
    }
}
