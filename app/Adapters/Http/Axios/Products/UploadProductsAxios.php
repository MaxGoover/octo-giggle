<?php

declare(strict_types=1);

namespace App\Adapters\Http\Axios\Products;

use App\Adapters\Http\Requests\Products\UploadProductsRequest;
use App\Adapters\Services\Product\Csv\ProductCsvParser;
use App\Adapters\Services\Product\Csv\ProductCsvStorage;
use Illuminate\Http\JsonResponse;

final class UploadProductsAxios
{
    public function handle(UploadProductsRequest $request): JsonResponse
    {
        $csvStorage = new ProductCsvStorage($request->file('file'));
        $csvStorage->storeFile();
        $filePath = $csvStorage->getFullFilePath();
        $csvParser = new ProductCsvParser($filePath);
        $csvParser->examine();
        $csvStorage->clearFile();

        return response()->json(['products' => $csvParser->getProducts()], 200);
    }
}
