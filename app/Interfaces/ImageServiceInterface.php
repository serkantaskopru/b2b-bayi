<?php

namespace App\Interfaces;

use Illuminate\Http\UploadedFile;

interface ImageServiceInterface
{
    /**
     * Uploads an image and returns a boolean indicating success.
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param string|null $filename
     * @param string|null $extension
     * @param array|null $scale
     * @return array|null
     */
    public function uploadImage(UploadedFile $file, string $directory, ?string $filename = null, ?string $extension = null, ?array $scale = null): array|null;
}
