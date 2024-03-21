<?php

declare(strict_types=1);

namespace App\Adapters\Http\Axios\Notifications;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class GetNotificationsAxios
{
    public function handle(Request $request): JsonResponse
    {
        return response()->json([
            'notifications' => $request->user()
                ->notifications()
                ->latest()
                ->paginate(config('settings.notification.pagination.rowsPerPage'))
        ], 200);
    }
}
