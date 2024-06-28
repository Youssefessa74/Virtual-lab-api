<?php

namespace App\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait Upload_image
{



    function UploadImage(Request $request,$inputName,$old_path=Null,$path ='/uploads'){
        if($request->hasFile($inputName)){

            $image = $request->file($inputName);
            $extension =$image->getClientOriginalExtension();
            $imageName ='media'.uniqid().'.'.$extension;
            $image->move(public_path($path),$imageName);
            return $path .'/'.$imageName;

            // Check if the image exists already ( notice : we just use this case in update )
            if($old_path && File::exists(public_path($old_path))){
                File::delete(public_path($old_path));
            }
        }
        return Null ;
    }

    public function remove_image(string $path){
        if($path && File::exists(public_path($path))){
          File::delete(public_path($path));
        }
    }
}
