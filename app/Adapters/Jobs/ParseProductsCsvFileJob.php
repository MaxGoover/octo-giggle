<?php

namespace App\Adapters\Jobs;

use App\Adapters\Services\Product\Csv\ProductCsvParser;
use App\Adapters\Services\Product\Csv\ProductCsvStorage;
use App\Adapters\Services\Product\ProductStorage;
use App\Adapters\Notifications\UploadFileProductsNotification;
use App\Entities\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ParseProductsCsvFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string         $_fileName;
    private string         $_filePath;
    private ProductStorage $_productStorage;
    private User           $_user;

    /**
     * Create a new job instance.
     */
    // public function __construct(ProductCsvStorage $productCsvStorage)
    public function __construct(User $user, string $fileName, string $filePath)
    {
        $this->_user = $user;
        $this->_fileName = $fileName;
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
        $this->_user->notify(new UploadFileProductsNotification(
            __('notification.product.uploadFile.success', ['fileName' => $this->_fileName]),
        ));
    }
}
