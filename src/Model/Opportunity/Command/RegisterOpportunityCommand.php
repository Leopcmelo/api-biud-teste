<?php

namespace App\Model\Opportunity\Command;

use App\Entity\Opportunity;

class RegisterOpportunityCommand{

    /**
     * @var Opportunity
     */
    private $opportunity;

    public function __construct(Opportunity $opportunity)
    {
        $this->opportunity = $opportunity;
    }

    /**
     * @return Opportunity
     */
    public function getOpportunity(): Opportunity
    {
        return $this->opportunity;
    }


}