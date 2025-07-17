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
    protected function removeImage($path) // حذف عکس
    {
        // مسیر اصلی پروژه تا پوشه public
        $basePath = __DIR__ . '/../../public/';
    
        // حذف هر اسلش اضافی از ابتدا یا انتهای مسیر فایل
        $cleanPath = trim($path, '/\\');
    
        // مسیر کامل فایل
        $fullPath = $basePath . $cleanPath;
    
        // تبدیل اسلش‌ها به اسلش سازگار با سیستم‌عامل
        $fullPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $fullPath);
    
        // حذف فایل اگر وجود داشته باشد
        if (file_exists($fullPath)) {
            unlink($fullPath);
            return true;
        }
    
        return false;
    }
    
    
    
     }