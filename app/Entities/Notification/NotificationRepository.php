<?php

declare(strict_types=1);

namespace App\Entities\Notification;

use App\Adapters\Helpers\Notification\NotificationHelper;

final class NotificationRepository
{
    public static function create(string $text, int $typeId, $payload = null): Notification
    {
        return Notification::firstOrCreate([
            NotificationHelper::PAYLOAD => $payload,
            NotificationHelper::TEXT    => $text,
            NotificationHelper::TYPE_ID => $typeId,
        ]);
    }
}
