<?php

declare(strict_types=1);

namespace App\Adapters\Notifications;

use App\Adapters\Helpers\Notification\NotificationHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductUploadFile extends Notification implements ShouldQueue
{
    use Queueable;

    private string $_text;
    private int $_typeId;

    public function __construct(string $text, int $typeId)
    {
        $this->_text = $text;
        $this->_typeId = $typeId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable)
    {
        return new DatabaseMessage([
            NotificationHelper::TEXT    => $this->_text,
            NotificationHelper::TYPE_ID => $this->_typeId,
        ]);
    }
}
