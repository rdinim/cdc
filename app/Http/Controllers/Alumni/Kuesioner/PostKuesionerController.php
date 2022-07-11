<?php

namespace App\Http\Controllers\Alumni\Kuesioner;

use App\Http\Controllers\Controller;
use App\Models\Question;
// use Illuminate\Http\Request;
use App\Http\Requests\KuesionerRequest;
use App\Models\Answer;

class PostKuesionerController extends Controller
{
    //
    public function __invoke(KuesionerRequest $request)
    {
        // $array = array_map(function ($value) {
        //     if (is_array($value)) {
        //         return array_filter($value);
        //     }
        // }, $request->except('_token'));
        // dd($array);
        
        $answers = array_map(function ($answer) {
            if (is_array($answer)) {
                if (array_filter($answer) !== []) {
                    return array_filter($answer);
                }
                return;
            }
            return $answer;
        }, $request->except('_token'));
        $answers = array_filter($answers);
        // dd($answers);
        // dd($request->except('_token'));
       
        // dd($answer_kuesioner);
        foreach ($answers as $key => $value) {
            // dump($key);
            // dump($key.':');
            // dump($value);
            if(! is_array($value))
            {
                $answer_kuesioner = new Answer();
                $answer_kuesioner->idstudent = auth()->user()->id_pengguna;
                $answer_kuesioner->idquestion = Question::where('name' ,'=', $key)->first()->id;
                $answer_kuesioner->answer = $value;
                // dump($answer_kuesioner);
                $answer_kuesioner->save();
            }
            else
            {
                foreach ($value as $nilai) {
                    $answer_kuesioner = new Answer();
                    $answer_kuesioner->idstudent = auth()->user()->id_pengguna;
                    $answer_kuesioner->idquestion = Question::where('name' ,'=', $key)->first()->id;
                    $answer_kuesioner->answer = $nilai;
                    // dd($answer_kuesioner);
                    $answer_kuesioner->save();
                }
                
            }
            
        }
        // die;
        return redirect()->route('homepage')->withSuccess('Terima Kasih, Anda Sudah Berhasil Submit Kuesioner Tracer Study');
    }
}
