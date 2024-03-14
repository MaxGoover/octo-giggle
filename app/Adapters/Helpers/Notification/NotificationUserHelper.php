<?php

declare(strict_types=1);

namespace App\Adapters\Helpers\Notification;

final class NotificationUserHelper
{
    const TABLE_NAME = 'notification_user';

    const IS_RED = 'is_red';
    const NOTIFICATION_ID = 'notification_id';
    const USER_ID = 'user_id';

    const LIST_FIELDS = [
        self::IS_RED,
        self::NOTIFICATION_ID,
        self::USER_ID,
    ];
}
