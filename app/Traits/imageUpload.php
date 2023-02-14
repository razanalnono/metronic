<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait imageUpload
{

    public function imageUpload($image, $folder)
    {
        try {
            $file_extension = $image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = $folder . '/' . $file_name;
            $image->move(public_path($folder), $file_name);
        } catch (\Exception $e) {
            return asset('https://img.favpng.com/2/12/12/computer-icons-portable-network-graphics-user-profile-avatar-png-favpng-L1ihcbxsHbnBKBvjjfBMFGbb7.jpg');
        }

        return $path;
    }





}
    