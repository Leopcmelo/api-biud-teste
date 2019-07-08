<?php

namespace App\Model\Opportunity\Handler;

use App\Interfaces\HandlerInterface;
use App\Model\Opportunity\Command\RegisterOpportunityBiuderCommand;
use App\Model\Opportunity\Command\RegisterOpportunityCommand;
use App\Repository\OpportunityRepository;
use App\Repository\UserRepository;

class RegisterOpportunityBiuderHandler implements HandlerInterface
{
    /**
     * @var OpportunityRepository
     */
    protected $opportunityRepository;

    public function __construct(OpportunityRepository $opportunityRepository)
    {
        $this->opportunityRepository = $opportunityRepository;
    }

    public function handle(RegisterOpportunityBiuderCommand $command)
    {
        $this->opportunityRepository->save($command->getOpportunity());
    }
}