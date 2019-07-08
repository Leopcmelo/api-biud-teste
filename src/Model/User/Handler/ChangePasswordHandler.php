<?php

namespace App\Model\User\Handler;

use App\Interfaces\HandlerInterface;
use App\Model\User\Command\ChangePasswordCommand;
use App\Repository\UserRepository;
use App\Service\SendMailService;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ChangePasswordHandler implements HandlerInterface
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    protected $encoder;

    public function __construct(UserRepository $userRepository, UserPasswordEncoderInterface $encoder)
    {
        $this->userRepository = $userRepository;
        $this->encoder = $encoder;
    }

    public function handle(ChangePasswordCommand $command)
    {
        $user = $this->userRepository->findOneBy(["email" => $command->getEmail()]);

        $sendMail = new SendMailService($user);

        $newPassword = $sendMail->sendMail();

//        echo '<pre>'; \Doctrine\Common\Util\Debug::dump($newPassword);die();

        $user->setPassword($this->encoder->encodePassword($user, $newPassword));

        $this->userRepository->save($user);
    }
}