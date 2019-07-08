<?php

namespace App\Controller;

use App\Entity\Person;
use App\Entity\User;
use App\Model\User\Command\ChangePasswordCommand;
use App\Model\User\Command\RegisterUserCommand;
use App\Repository\UserRepository;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserController extends AbstractController
{
    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return JsonResponse
     * @Rest\Post("register")
     */
    public function postRegisterUserAction(Request $request, UserPasswordEncoderInterface $encoder, UserRepository $userRepository)
    {
        $user = new User();
        $person = new Person();


//        $count = $userRepository->count([]);

        $user->setEmail($request->request->get("email"));
        $user->setRoles(["USER_ROLE"]);
        $user->setPassword($encoder->encodePassword($user, $request->request->get("password")));
//        $person->setId($count + 1);
        $person->setPhone($request->request->get('phone'));
        $person->setName($request->request->get('name'));
        $person->setPhoto($request->request->get('photo'));
        $person->setSkills($request->request->get('skills'));
        $person->setCpf($request->request->get('cpf'));
        $person->setBankName($request->request->get('bankName'));
        $person->setAgency($request->request->get('agency'));
        $person->setAccount($request->request->get('account'));
        $user->setPerson($person);

//        echo '<pre>'; \Doctrine\Common\Util\Debug::dump($person);die();

        return new JsonResponse($this->commandBus->handle(
            new RegisterUserCommand($user)));
    }

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return JsonResponse
     * @Rest\Post("change-password")
     */
    public function postChangePasswordAction(Request $request)
    {
        $email = $request->request->get("email");

        return $this->commandBus->handle(
            new ChangePasswordCommand($email));
    }

}