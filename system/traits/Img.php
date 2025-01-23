<?php
namespace System\Traits;
trait Img {
protected function  saveImage($image, $imagePath, $imageName = null)//? uploaded img 
    {

            if($imageName)
            {
                    $extension = explode('/', $image['type'])[1];
                    $imageName = $imageName . '.' . $extension;
            }
            else{
                    $extension = explode('/', $image['type'])[1];
                    $imageName = date("Y-m-d-H-i-s") . '.' . $extension;
            }

            $imageTemp = $image['tmp_name'];
            $imagePath = 'public' . $imagePath . '/';

            if(is_uploaded_file($imageTemp))
            {
                    if(move_uploaded_file($imageTemp, $imagePath . $imageName)){
                            return $imagePath . $imageName;
                    }
                    else{
                            return false;
                    }
            }
            else{
                    return false;
            }

    }
    protected function removeImage($path)//? delete img 
    {
            $base = 'C:/xampp/htdocs/TahrirKhayam/public' ;
            $path = trim($base, '/ ') . '/' . trim($path, '/ ');
            if(true)
            {
                    unlink($path);
                    return true ;
            }
            else {
                return false ;
            }
    } }