<?php

namespace App\Http\Controllers\Admin\Layanan\BimbinganKarir;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
// use Illuminate\Http\Request;
use App\Http\Requests\BimbinganKarirRequest;
use Illuminate\Support\Facades\Storage;

class CreateBimbinganKarirController extends Controller
{
    //store new bimbingan karir data
    public function __invoke(BimbinganKarirRequest $request)
    {
        $filePath = null;
        if ($request->hasFile('flyer')) {
            // $file = $request->file('flyer');
            // /* str_replace --> for replace string with another string. we need to replace whitespaces with underscores */
            // $pathinfo = pathinfo(str_replace(' ', '_', $file->getClientOriginalName()));
            // $fileName = $pathinfo['filename'].date('YmdHis').'.'.$pathinfo['extension'];

            // $directory = 'images/bimbingan-karir/';
    
            // Storage::disk('public')->putFileAs($directory, $file, $fileName);

            // $filePath = $directory.$fileName;

            $directory = 'images/bimbingan-karir/';
            $file = $request->file('flyer');
            $filePath = FileHelper::storeFile($directory, $file);
        }

        $new_bimbingankarir = new Agenda;
        $new_bimbingankarir->idagenda = 1; //default id for bimbingan karir
        $new_bimbingankarir->idcategory = $request->category;
        $new_bimbingankarir->title = $request->title;
        $new_bimbingankarir->agendadesc = $request->agendadesc;
        $new_bimbingankarir->schedule = $request->schedule;
        $new_bimbingankarir->flyer = $filePath;
        $new_bimbingankarir->slug = $request->slug;
        $new_bimbingankarir->created_by = 1; //temporary
        $new_bimbingankarir->save();
        return redirect()->route('list-bimbingan-karir');

    }
}
