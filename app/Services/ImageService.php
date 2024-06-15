<?php

namespace App\Services;

use App\Interfaces\ImageServiceInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageService implements ImageServiceInterface
{
    public function uploadImage(UploadedFile $file, string $directory, ?string $filename = null, ?string $extension = null, ?array $scale = null): array | null
    {
        try {
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);

            if ($scale !== null && count($scale) >= 2 && is_numeric($scale[0]) && is_numeric($scale[1])) {
                $image->scale(width: $scale[0], height: $scale[1]);
            }

            $filename = $filename ?: pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $extension ?: $file->getClientOriginalExtension();

            switch ($extension){
                case "png":
                    $image->toPng();
                    break;
                case "jpeg":
                case "jpg":
                    $image->toJpeg();
                    break;
                case "gif":
                    $image->toGif();
                    break;
                case "avif":
                    $image->toAvif();
                    break;
                case "bmp":
                    $image->toBitmap();
                    break;
                case "tiff":
                    $image->toTiff();
                    break;
                default:
                    $image->toWebp();
            }

            $tenantDirectory = Str::replace('-','',Str::slug(app('currentTenant')->name));
            $storagePath = storage_path('app/public/' . $tenantDirectory . '/'. $directory);

            if (!file_exists($storagePath)) {
                mkdir($storagePath, 0755, true);
            }

            $savePath = $storagePath . '/' . $filename . '.' . $extension;

            $image->save($savePath);
            return [
                'path' => $tenantDirectory . '/'. $directory . '/' . $filename . '.' . $extension,
                'image' => $image
            ];
        } catch (\Exception $e) {
            return null;
        }
    }
}
