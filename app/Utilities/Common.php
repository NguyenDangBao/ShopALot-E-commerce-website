<?php

namespace App\Utilities;



use Carbon\Carbon;
use Illuminate\Support\Str;

class Common
{
    public static function uploadFile($file, $path){
        $file_name_original = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file_name_without_extension = Str::replaceLast('.' . $extension, '', $file_name_original);

        $str_time_now=Carbon::now()->format('Ymd_his');
        $file_name=Str::slug($file_name_without_extension) . '_' . $str_time_now . '.' . $extension;
        $file->move($path, $file_name);

        return $file_name;
    }
}
