<?php

namespace Database\Seeders;

use App\Adapters\Helpers\Notification\NotificationTypeHelper;
use App\Entities\Notification\NotificationType;
use Illuminate\Database\Seeder;

class NotificationTypesSeeder extends Seeder
{
    protected $notificationTypes = [
        [
            'codename' => NotificationTypeHelper::COMMON,
            'name'     => 'Общие',
        ],
        [
            'codename' => NotificationTypeHelper::PERSONAL,
            'name'     => 'Личные',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->notificationTypes as $notificationType) {
            NotificationType::firstOrCreate($notificationType);
        }
    }
}
