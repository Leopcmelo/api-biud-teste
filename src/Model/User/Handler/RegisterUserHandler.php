<?php

namespace App\Model\User\Handler;

use App\Interfaces\HandlerInterface;
use App\Model\User\Command\RegisterUserCommand;
use App\Repository\UserRepository;

class RegisterUserHandler implements HandlerInterface
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(RegisterUserCommand $command)
    {
        $this->userRepository->save($command->getUser());

    }
}