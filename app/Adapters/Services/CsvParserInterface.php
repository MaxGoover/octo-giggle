<?php

declare(strict_types=1);

namespace App\Adapters\Services;

interface CsvParserInterface {
    public function examine(): void;
}
