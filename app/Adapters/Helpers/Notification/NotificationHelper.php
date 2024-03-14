<?php

declare(strict_types=1);

namespace App\Adapters\Helpers\Notification;

final class NotificationHelper
{
    const TABLE_NAME = 'notifications';

    const PAYLOAD = 'payload';
    const TEXT = 'text';
    const TYPE_ID = 'type_id';

    const LIST_FIELDS = [
        self::PAYLOAD,
        self::TEXT,
        self::TYPE_ID,
    ];
}
