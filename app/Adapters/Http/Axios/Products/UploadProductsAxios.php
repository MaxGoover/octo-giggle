<?php

declare(strict_types=1);

namespace App\Adapters\Http\Axios\Products;

use App\Adapters\Http\Requests\Products\UploadProductsRequest;
use App\Adapters\Jobs\ParseProductsCsvFileJob;
use App\Adapters\Services\Product\Csv\ProductCsvParser;
use App\Adapters\Services\Product\Csv\ProductCsvStorage;
use App\Adapters\Services\Product\ProductStorage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

final class UploadProductsAxios
{
    public function handle(UploadProductsRequest $request): JsonResponse
    {
        $filePath = ProductCsvStorage::storeFile($request->file('file'));
        // $pathFile = $this->_productCsvStorage->getPathFile();
        // $csvParser = new ProductCsvParser($pathFile);
        // $csvParser->examine();
        // $this->_productCsvStorage->clearFile();
        // $products = $csvParser->getProducts();
        // $this->_productStorage->createOrUpdate($products);
        // ParseProductsCsvFileJob::dispatch($this->_productCsvStorage)->onQueue('default');
        // $this->_productCsvStorage->storeFile($request->file('file'));
        ParseProductsCsvFileJob::dispatch($filePath)->onQueue('default');
        return response()->json(['message' => 'norm'], 200);
    }
}
