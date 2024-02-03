<?php

declare(strict_types=1);

namespace App\UseCases\Auth\SendSmsCode;

final class Query
{
    public readonly string $phone;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }
}
