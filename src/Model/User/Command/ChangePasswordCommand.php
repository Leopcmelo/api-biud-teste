<?php

namespace App\Model\User\Command;

class ChangePasswordCommand{


    /**
     * @var string
     */
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }



}