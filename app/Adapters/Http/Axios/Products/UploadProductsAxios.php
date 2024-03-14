<?php

declare(strict_types=1);

namespace App\Adapters\Http\Axios\Products;

use App\Adapters\Http\Requests\Products\UploadProductsRequest;
use App\Adapters\Jobs\ParseProductsCsvFileJob;
use App\Adapters\Services\Product\Csv\ProductCsvStorage;
use Illuminate\Http\JsonResponse;

final class UploadProductsAxios
{
    public function handle(UploadProductsRequest $request): JsonResponse
    {
        $filePath = ProductCsvStorage::storeFile($request->file('file'));
        ParseProductsCsvFileJob::dispatch($filePath)->onQueue('default');

        return response()->json(['message' => 'norm'], 200);
    }
}
