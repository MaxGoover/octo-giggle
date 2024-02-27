<?php

declare(strict_types=1);

namespace App\Adapters\Services\Product\Csv;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductCsvStorage
{
    private UploadedFile $file;
    private string $filePath = '';

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function clearFile(): bool
    {
        return Storage::disk('local')->delete($this->filePath);
    }

    public function getFullFilePath()
    {
        return Storage::disk('local')->path($this->filePath);
    }

    public function storeFile(): void
    {
        $fileExtension = $this->file->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $fileExtension;
        $this->filePath = Storage::disk('local')->putFileAs(config('settings.product.csvStorage.url.store'), $this->file, $fileName);
    }
}
