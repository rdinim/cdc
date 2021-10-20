<?php

namespace App\Http\Controllers\Admin\Layanan\BimbinganKarir;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
// use Illuminate\Http\Request;
use App\Http\Requests\BimbinganKarirRequest;
use Illuminate\Support\Facades\Storage;

class UpdateBimbinganKarirController extends Controller
{
    //do your logic
    public function __invoke(Agenda $bimbingan_karir, BimbinganKarirRequest $request)
    {
        /* set the default path to be stored in db */
        $filePath = !empty($bimbingan_karir->flyer) ? $bimbingan_karir->flyer : null;
        
        /* check if request has file (flyer updated) */
        if ($request->hasFile('flyer')) {
            // /* if old flyer exists --> delete it first */
            // if (Storage::disk('public')->exists($bimbingan_karir->flyer)) {
            //     Storage::disk('public')->delete($bimbingan_karir->flyer);
            // }

            // $file = $request->file('flyer');
            // /* str_replace --> for replace string with another string. we need to replace whitespaces with underscores */
            // $pathinfo = pathinfo(str_replace(' ', '_', $file->getClientOriginalName()));
            // $fileName = $pathinfo['filename'].date('YmdHis').'.'.$pathinfo['extension'];

            // $directory = 'images/bimbingan-karir/';
    
            // /* store the new flyer */
            // Storage::disk('public')->putFileAs($directory, $file, $fileName);

            // /* the new path in db */
            // $filePath = $directory.$fileName;

            $directory = 'images/bimbingan-karir/';
            $file = $request->file('flyer');
            $oldFilePath = $bimbingan_karir->flyer;
            $filePath = FileHelper::storeFile($directory, $file, $oldFilePath);
        }

        $bimbingan_karir->idcategory = $request->category;
        $bimbingan_karir->title = $request->title;
        $bimbingan_karir->agendadesc = $request->agendadesc;
        $bimbingan_karir->schedule = $request->schedule;
        $bimbingan_karir->flyer = $filePath;
        // $bimbingan_karir->slug = $request->slug;
        $bimbingan_karir->updated_by = 1; //temporary
        $bimbingan_karir->save();
        return redirect()->route('list-bimbingan-karir');
    }
}
