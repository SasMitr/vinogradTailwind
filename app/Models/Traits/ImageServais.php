<?php

namespace App\Models\Traits;

use App\Http\Requests\Admin\Shop\Product\ProductRequest;
use App\Jobs\GalleryProcessing;
use App\Jobs\ImageProcessing;
use App\Services\ImageService;
use App\Services\Size;
use Illuminate\Support\Facades\Storage;

trait ImageServais
{
    public function getDirContentImageName()
    {
        return 'content';
    }

    public function getOriginImageName()
    {
        return 'origin.jpg';
    }

    public function getImageWatermark()
    {
        return 'img/logo/watermark-vinograd-blog.png';
    }

    public function getDefaultOrigin(): string
    {
        return 'pics/img/default/origin.jpg';
    }

    private function getDefaultValue($value): string
    {
        return $value
            ? str($this->getDefaultOrigin())->beforeLast('/')->append("/$value.jpg")
            : $this->getDefaultOrigin();
    }

    public function getPath(): string
    {
        $className = strtolower(class_basename(self::class));
        $dir = implode('/', array_slice(explode('\\', self::class),-2,2));
        return "pics/$dir/$className-{$this->id}/";
    }

    public function getContentPath(): string
    {
        return $this->getPath() . $this->getDirContentImageName() . '/';
    }

    public function fitImage(): void
    {
        if ($this->imageList) {
            foreach ($this->imageList as $value) {
                $this->saveImage(new Size($value));
            }
        }
    }

    private function isOriginImage(): bool
    {
        return Storage::exists($this->getOriginImage());
    }

    public function getImage($value = false): string
    {
        if (!$value) {
            return $this->getOriginImageURL();
        }

        if (!$this->isOriginImage()) {
            return $this->getDefaultImage($value);
        }

        return $this->saveImage(new Size($value));
    }

    public function removeImage(): void
    {
        $files = Storage::files($this->getPath());
        Storage::delete($files);
    }

    public function deleteImages(): void
    {
        Storage::deleteDirectory($this->getPath());
    }

    public function uploadImage($image): void
    {
        if ($image == null) {return;}

        $this->removeImage();

        if(!Storage::exists($this->getPath())){
            Storage::makeDirectory($this->getPath());
        }

        $img = new ImageService(new Size('0x0'));
        $img->routeUrlImageSave($image, $this->getOriginImage(), $this->getImageWatermark());
    }

    private function getOriginImage(): string
    {
        return $this->getPath() . $this->getOriginImageName();
    }

    private function getOriginImageURL(): string|null
    {
        return $this->isOriginImage()
            ? Storage::url($this->getOriginImage())
            : $this->getDefaultImage();
    }

    private function isDefaultImage($value): bool
    {
        return Storage::exists($this->getDefaultValue($value));
    }

    private function getDefaultImage(string|bool $value = false): string
    {
        if ($this->isDefaultImage($value)) {
            return Storage::url($this->getDefaultValue($value));
        }

        return $this->saveDefaultImage(new Size($value));
    }

    private function saveDefaultImage(Size $size): string
    {
        $path = $this->getDefaultValue($size->width . 'x' . $size->height);

        $image = new ImageService($size);
        $image->routeImageSave($this->getDefaultValue(null), $path);

        return Storage::url($path);
    }

    private function saveImage(Size $size): string
    {
        $path = $this->getPath() . $size->width . 'x' . $size->height . '.jpg';

        if (Storage::exists($path)) {
            return Storage::url($path);
        }

        $image = new ImageService($size);
        $image->routeImageSave($this->getOriginImage(), $path, $this->getImageWatermark());

        return Storage::url($path);
    }


    public function imageProcessing(ProductRequest $request): void
    {
        $this->uploadImage($request->file('image'));
        $this->removeImageFromGallery($request->get('removeGallery'));
        $this->uploadGallery($request->file('gallery'));

        if($request->file('image') != null) {
            ImageProcessing::dispatch($this);
//                $this->fitImage();
        }
        if($request->file('gallery') != null){
            GalleryProcessing::dispatch($this);
//                $this->fitGallery();
        }
    }
}
