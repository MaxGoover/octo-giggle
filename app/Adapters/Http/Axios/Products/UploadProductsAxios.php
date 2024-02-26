<?php

declare(strict_types=1);

namespace App\Adapters\Http\Axios\Products;

use App\Adapters\Http\Requests\Products\UploadProductsRequest;
use App\Entities\Product\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

final class UploadProductsAxios
{
    public function handle(UploadProductsRequest $request): JsonResponse
    {
        $extension = $request->file('file')->getClientOriginalExtension();
        $tempFileName = uniqid() . '.' . $extension;
        $tempFilePath = Storage::disk('local')->putFileAs('/products/csv', $request->file('file'), $tempFileName);
        $fullTempFilePath = Storage::disk('local')->path($tempFilePath);

        $productCategories = ProductCategory::pluck('id', 'name')->all();

        $file = fopen($fullTempFilePath, 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            // парсим csv-файл
            $row = [
                'amount' => $line[5],
                'article' => $line[2],
                'category_id' => $productCategories[$line[1]] ?? reset($productCategories),
                'description' => $line[4],
                'name' => $line[3],
            ];
        }
        fclose($file);

        Storage::disk('local')->delete($tempFilePath);

        return response()->json([], 200);
    }
}
