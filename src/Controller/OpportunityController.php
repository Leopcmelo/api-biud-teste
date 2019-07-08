<?php

namespace App\Controller;

use App\Entity\Opportunity;
use App\Entity\Person;
use App\Model\Opportunity\Command\RegisterOpportunityBiuderCommand;
use App\Model\Opportunity\Command\RegisterOpportunityCommand;
use App\Repository\OpportunityRepository;
use App\Repository\PersonRepository;
use App\Repository\UserRepository;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class OpportunityController extends AbstractController
{
    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return JsonResponse
     * @Rest\Get("opportunity/list")
     */
    public function getAllOpportunitiesAction(Request $request, OpportunityRepository $opportunityRepository)
    {
        return $opportunityRepository->findBy([]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Rest\Post("opportunity/register")
     */
    public function postRegisterOpportunityAction(Request $request)
    {
        $opportunity = new Opportunity();

        $opportunity->setCategory($request->request->get('category'));
        $opportunity->setCompany($request->request->get('company'));
        $opportunity->setDeadline($request->request->get('deadline'));
        $opportunity->setPrice($request->request->get('price'));

        return new JsonResponse($this->commandBus->handle(
            new RegisterOpportunityCommand($opportunity)));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Rest\Put("opportunity/biuder")
     */
    public function putBiuderGetOpportunityAction(Request $request, OpportunityRepository $opportunityRepository, UserRepository $userRepository)
    {
        $opportunity = $opportunityRepository->findOneBy(["id" => $request->request->get('opportunityId')]);
        $biuder = $userRepository->findOneBy(["email" => $request->request->get('username')]);

        $opportunity->setBiuder($biuder->getId());

        return new JsonResponse($this->commandBus->handle(
            new RegisterOpportunityBiuderCommand($opportunity)));
    }
}