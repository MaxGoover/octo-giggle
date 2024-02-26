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

        // Парсим первые 5 строк (вынести эту настройку в конфиг)
        // Если, например 3-я строка годная, то от неё и пляшем
        // Если ни одна из 5-ти строк не подходит под нашу структуру, отдаем исключение

        for ($i = 0; $i < config('products'); $i++) {
            if (($line = fgetcsv($file)) !== FALSE) {
                $row = [
                    'amount' => $line[5],
                    'article' => $line[2],
                    'category_id' => $productCategories[$line[1]] ?? reset($productCategories),
                    'description' => $line[4],
                    'name' => $line[3],
                ];
            }
        }

        while (($line = fgetcsv($file)) !== FALSE) {
            // парсим csv-файл
            $row = [
                'amount' => $line[5],
                'article' => $line[2],
                'category_id' => $productCategories[$line[1]] ?? reset($productCategories),
                'description' => $line[4],
                'name' => $line[3],
            ];
            dump($line);
        }
        fclose($file);

        Storage::disk('local')->delete($tempFilePath);

        return response()->json([], 200);
    }
}
