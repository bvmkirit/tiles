<?php
use App\Models\Setting;
function setImage($file,$folder,$type=null){
    if($type == 'edit'){
    }
    $filename = $folder .'-'. rand() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path($folder), $filename);
    return  $folder.'/'.$filename;
}

function setWebsite($type){
    $data = Setting::first()->value($type);
    return $data;
}

