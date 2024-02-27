<?php

declare(strict_types=1);

namespace App\Adapters\Services\Product\Csv;

use App\Adapters\Helpers\Product\ProductHelper;
use App\Adapters\Services\CsvParserInterface;
use App\Entities\Product\ProductCategory;
use Illuminate\Support\Facades\Validator;
use Exception;

final class ProductCsvParser implements CsvParserInterface
{
    private string $filePath;
    private array $products = [];

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function examine(): void
    {
        if (!$this->_isValidatedFirstRows()) {
            throw new Exception('Не удалось распарсить файл');
        }

        $productCategories = ProductCategory::pluck('id', 'name')->all();
        $file = fopen($this->filePath, 'r');

        while (($line = fgetcsv($file)) !== false) {
            $product = [
                ProductHelper::CATEGORY_ID => $productCategories[$line[1]] ?? reset($productCategories),
                ProductHelper::ARTICLE => $line[2],
                ProductHelper::NAME => $line[3],
                ProductHelper::DESCRIPTION => $line[4],
                ProductHelper::AMOUNT => $line[5],
            ];

            if ($this->_isValidated($product)) {
                $this->products[] = $product;
            }
        }

        fclose($file);
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    private function _isValidated(array $product): bool
    {
        $validator = Validator::make($product, config('validation.product'));
        return !$validator->fails();
    }

    private function _isValidatedFirstRows(): bool
    {
        $productCategories = ProductCategory::pluck('id', 'name')->all();
        $file = fopen($this->filePath, 'r');
        $isValidated = false;
        $product = [];

        for ($i = 0; $i < config('settings.product.parser.count.firstRowsValidation'); $i++) {
            if (($line = fgetcsv($file)) === false) {
                continue;
            }

            $product = [
                ProductHelper::CATEGORY_ID => $productCategories[$line[1]] ?? reset($productCategories),
                ProductHelper::ARTICLE => $line[2],
                ProductHelper::NAME => $line[3],
                ProductHelper::DESCRIPTION => $line[4],
                ProductHelper::AMOUNT => $line[5],
            ];

            if ($this->_isValidated($product)) {
                $isValidated = true;
                break;
            }
        }

        fclose($file);
        return $isValidated;
    }
}
