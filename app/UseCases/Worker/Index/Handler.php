<?php

declare(strict_types=1);

namespace App\UseCases\Worker\Index;

// use App\Entity\Account\Account;
// use App\Entity\Account\AccountRepository;
// use App\Entity\User\UserRepository;
// use DomainException;

// use App\Entity\Account\Account;
// use App\Entity\Account\AccountRepository;
use App\Entities\Worker\WorkerRepository;
use DomainException;

final class Handler
{
    private WorkerRepository $workers;

    public function __construct(
        WorkerRepository $workers,
    ) {
        $this->workers = $workers;
    }

    public function handle(Command $command)
    {
        // здесь обрабатываем Command и передаем его в index
        return $this->workers->index();
    }
}

// final class Handler
// {
//     const START_BALANCE = 100;

//     private AccountRepository $accounts;
//     private UserRepository $users;

//     public function __construct(
//         AccountRepository $accounts,
//         UserRepository $users,
//     ) {
//         $this->accounts = $accounts;
//         $this->users = $users;
//     }

//     public function handle(Command $command): void
//     {
//         if (!$this->users->hasByUsername($command->owner)) {
//             throw new DomainException('user with this username does not exist');
//         }

//         if ($this->accounts->hasByOwner($command->owner)) {
//             throw new DomainException('user with this username already has an account');
//         }

//         $account = new Account(
//             $command->owner,
//             self::START_BALANCE,
//             $command->currency_id,
//             date("Y-m-d H:i:s"),
//         );

//         $this->accounts->save($account);
//     }
// }
