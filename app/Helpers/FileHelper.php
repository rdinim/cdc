<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function storeFile($directory, $file, $oldFilePath = null)
    {
        /* if old flyer exists --> delete it first */
        if ($oldFilePath != null && Storage::disk('public')->exists($oldFilePath)) {
            Storage::disk('public')->delete($oldFilePath);
        }

        /* str_replace --> for replace string with another string. we need to replace whitespaces with underscores */
        $pathinfo = pathinfo(str_replace(' ', '_', $file->getClientOriginalName()));
        $fileName = $pathinfo['filename'].date('YmdHis').'.'.$pathinfo['extension'];

        /* store the new flyer */
        Storage::disk('public')->putFileAs($directory, $file, $fileName);

        /* the new path in db */
        $filePath = $directory.$fileName;

        return $filePath;
    }
}