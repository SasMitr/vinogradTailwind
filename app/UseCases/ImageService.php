<?php

namespace App\UseCases;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
//use Intervention\Image\Drivers\Imagick\Driver; // Неработает с очередями

class ImageService
{
    public $width;
    public $height;

    public function __construct(Size $size)
    {
        $this->width = $size->width;
        $this->height = $size->height;
    }

    public function saveImage($fromPath, $savePath, $watermark = false)
    {
        $manager = new ImageManager(new Driver());
        $img = $manager->read($fromPath);

//        $img = ImageManager::imagick()->read($fromPath); // Неработает с очередями

        if($this->width && $this->height){
            $img->cover($this->width, $this->height);
        }

        if($watermark && $this->width > 300){
            //Наложение водяного знака
            $img->place(storage_path('app/public/pics/') . $watermark,'bottom-right', 0,0);
        }
        $img->save($savePath, quality: 70);
    }

    public function routeGalleryImageSave($fromPath, $savePath, $watermark = false)
    {
        //$this->saveImage(public_path() .'/'. $fromPath, public_path() .'/'. $savePath. '/' . class_basename($fromPath));
        $this->saveImage(storage_path('app/public/') . $fromPath, storage_path('app/public/') . $savePath. '/' . class_basename($fromPath), $watermark);
    }

    public function routeImageSave($fromPath, $savePath, $watermark = false)
    {
        //dd(storage_path('app/public/') . $fromPath, $savePath, storage_path('app/public/') . $savePath);
        //$this->saveImage(public_path() .'/'. $fromPath, public_path() .'/'. $savePath);
        $this->saveImage(storage_path('app/public/') . $fromPath, storage_path('app/public/') . $savePath, $watermark);
    }

    public function routeUrlImageSave($fromPath, $savePath, $watermark = false)
    {
        $this->saveImage($fromPath, storage_path('app/public/') . $savePath, $watermark);
    }
}
