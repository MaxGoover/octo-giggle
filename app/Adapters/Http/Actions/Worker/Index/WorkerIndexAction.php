<?php

declare(strict_types=1);

namespace App\Adapters\Http\Actions\Worker\Index;

// use App\Command\Account\Create\Command;
// use App\Command\Account\Create\Handler;
// use App\Http\Response\JsonResponse;
// use Psr\Http\Message\ResponseInterface;
// use Psr\Http\Message\ServerRequestInterface;
// use Psr\Http\Server\RequestHandlerInterface;

use App\Adapters\Http\Actions\Action;
use App\Entities\Worker\WorkerRepository;
// use App\Adapters\Http\Actions\Worker\Index\WorkerIndexRequest;
use App\UseCases\Worker\Index\Command;
use App\UseCases\Worker\Index\Handler;
use Illuminate\Http\JsonResponse;
// use Psr\Http\Message\ResponseInterface;
// use Psr\Http\Message\ServerRequestInterface;
// use Psr\Http\Server\RequestHandlerInterface;

final class WorkerIndexAction extends Action
{
    // private Handler $handler;

    // public function __construct(Handler $handler)
    // {
    //     $this->handler = $handler;
    // }

    public function handle()
    {
        // dd($request->validated());
        // $data = $request->getBody();
        // $command = new Command($data);

        try {
            // $workers = $this->handler->handle($command);

            $workers = WorkerRepository::index();

            return Inertia('desktop/views/workers/DesktopPageWorkersIndex', [
                'workers' => $workers,
            ]);
        } catch (\Exception $error) {
            return response()->json($error, 400);
        }
    }
}
