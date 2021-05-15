<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait {
    public function storageTraitUpload($request, $fieldName, $foldername)
    {
        $data = null;
        if ($request->hasFile($fieldName)) {

            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHas = str_random(20). '.' . $file->getClientOriginalExtension();
            $path = $request->file($fieldName)->storeAs('public/' . $foldername .'/'. auth()->id(), $fileNameHas);
            $data = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($path)
            ];
        }

        return $data;
    }

    public function storageTraitUploadMultiple($file, $foldername)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHas = str_random(20). '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/' . $foldername .'/'. auth()->id(), $fileNameHas);
        $data = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($path)
        ];

        return $data;
    }
}