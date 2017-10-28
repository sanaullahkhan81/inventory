<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class upload extends Model
{
    static function uploadFile($sFile) 
    {
        $file = array('image' => $sFile);
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        $validator = Validator::make($file, $rules);
        
        if ($validator->fails()) 
        {
            return 'validate fails';
        }
        else 
        {
            if ($sFile->isValid()) 
            {
                $destinationPath = 'uploads'; // upload path
                $extension = $sFile->getClientOriginalExtension(); // getting image extension
                $fileName = time().'_'.rand(11111,99999).'.'.$extension; // renameing image
                $sFile->move($destinationPath, $fileName); // uploading file to given path 
                return 'true='.$fileName;
            }
            else 
            {
                return 'uploaded file is not valid.';
            }
        }
    }

}