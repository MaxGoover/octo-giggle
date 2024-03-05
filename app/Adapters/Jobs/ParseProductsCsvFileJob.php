<?php

namespace App\Adapters\Jobs;

use App\Adapters\Services\Product\Csv\ProductCsvParser;
use App\Adapters\Services\Product\Csv\ProductCsvStorage;
use App\Adapters\Services\Product\ProductStorage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ParseProductsCsvFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string         $_filePath;
    private ProductStorage $_productStorage;

    /**
     * Create a new job instance.
     */
    // public function __construct(ProductCsvStorage $productCsvStorage)
    public function __construct(string $filePath)
    {
        $this->_filePath = $filePath;
        $this->_productStorage = new ProductStorage;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $fullPathFile = ProductCsvStorage::getFullFilePath($this->_filePath);
        $productCsvParser = new ProductCsvParser($fullPathFile);
        $productCsvParser->examine();
        ProductCsvStorage::clearFile($this->_filePath);
        $products = $productCsvParser->getProducts();
        $this->_productStorage->createOrUpdate($products);
    }
}
