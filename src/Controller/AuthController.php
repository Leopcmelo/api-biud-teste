<?php
namespace App\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\FOSRestBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AuthController extends AbstractController
{

    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->__toString()));
    }

    public function __toString(): string {
        return (string) $this->getUser()->getUsername();
    }
}