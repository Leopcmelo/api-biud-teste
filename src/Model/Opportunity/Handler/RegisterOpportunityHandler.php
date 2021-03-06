<?php

namespace App\Model\Opportunity\Handler;

use App\Interfaces\HandlerInterface;
use App\Model\Opportunity\Command\RegisterOpportunityCommand;
use App\Model\User\Command\RegisterUserCommand;
use App\Repository\OpportunityRepository;
use App\Repository\UserRepository;

class RegisterOpportunityHandler implements HandlerInterface
{
    /**
     * @var OpportunityRepository
     */
    protected $opportunityRepository;

    public function __construct(OpportunityRepository $opportunityRepository)
    {
        $this->opportunityRepository = $opportunityRepository;
    }

    public function handle(RegisterOpportunityCommand $command)
    {
        $this->opportunityRepository->save($command->getOpportunity());

    }
}