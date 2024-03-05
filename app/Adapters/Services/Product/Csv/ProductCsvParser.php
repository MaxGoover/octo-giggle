<?php

declare(strict_types=1);

namespace App\Adapters\Services\Product\Csv;

use App\Adapters\Helpers\Product\ProductHelper;
use App\Adapters\Services\CsvParserInterface;
use App\Entities\Product\ProductCategory;
use Illuminate\Support\Facades\Validator;

final class ProductCsvParser implements CsvParserInterface
{
    private int    $_countExaminedLines = 0;
    private string $_pathFile;
    private bool   $_isProductAdded = false;
    private array  $_products = [];

    public function __construct(string $pathFile)
    {
        $this->_pathFile = $pathFile;
    }

    public function examine(): void
    {
        $productCategories = ProductCategory::pluck('id', 'name')->all();
        $file = fopen($this->_pathFile, 'r');

        while (($line = fgetcsv($file)) !== false) {
            if (!$this->_isCsvValidated()) {
                break;
            }

            $productCategoryId = $productCategories[$line[1]] ?? $productCategories['Другое'];
            $product = [
                ProductHelper::CATEGORY_ID => $productCategoryId,
                ProductHelper::ARTICLE => $line[2],
                ProductHelper::NAME => $line[3],
                ProductHelper::DESCRIPTION => $line[4] ?? null,
                ProductHelper::AMOUNT => $line[5],
            ];

            if ($this->_isProductValidated($product)) {
                $this->_addProduct($product);
                $this->_isProductAdded = true;
            }

            $this->_countExaminedLines++;
        }

        fclose($file);
    }

    public function getProducts(): array
    {
        return $this->_products;
    }

    private function _addProduct(array $product): void
    {
        $this->_products[] = $product;
    }

    private function _isCsvValidated(): bool
    {
        return $this->_countExaminedLines < config('settings.product.parser.count.firstRowsValidation') || $this->_isProductAdded;
    }

    private function _isProductValidated(array $product): bool
    {
        $validator = Validator::make($product, config('validation.product'));
        return !$validator->fails();
    }
}
