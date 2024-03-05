<?php

declare(strict_types=1);

namespace App\Adapters\Services\Product\Csv;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class ProductCsvStorage
{
    public static function clearFile(string $filePath): bool
    {
        return Storage::disk('local')->delete($filePath);
    }

    public static function getFullFilePath(string $filePath)
    {
        return Storage::disk('local')->path($filePath);
    }

    public static function storeFile(UploadedFile $file): string
    {
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $fileExtension;
        return Storage::disk('local')->putFileAs(config('settings.product.csvStorage.url.store'), $file, $fileName);
    }
}
