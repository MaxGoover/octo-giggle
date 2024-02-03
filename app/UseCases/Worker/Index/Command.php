<?php

declare(strict_types=1);

namespace App\UseCases\Worker\Index;

final class Command
{
    public bool $descending;
    public int $page;
    public int $rowsNumber;
    public int $rowsPerPage;
    public string $search;
    public array $sortBy;

    public function __construct($data)
    {
        foreach ($this as $key => $value) {
            $this->$key = $data[$key];
        }
    }
}
