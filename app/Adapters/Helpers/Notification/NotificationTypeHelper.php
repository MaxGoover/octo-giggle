<?php

declare(strict_types=1);

namespace App\Adapters\Helpers\Notification;

use App\Entities\Notification\NotificationType;

final class NotificationTypeHelper
{
    const TABLE_NAME = 'notification_types';

    const CODENAME = 'codename';
    const NAME = 'name';

    const COMMON = 'common';
    const PERSONAL = 'personal';

    const LIST_FIELDS = [
        self::CODENAME,
        self::NAME,
    ];

    const LIST_ROWS = [
        self::COMMON,
        self::PERSONAL,
    ];

    public static function getIdByCodename(string $codename): ?int
    {
        return NotificationType::where(self::CODENAME, $codename)->pluck('id');
    }
}
