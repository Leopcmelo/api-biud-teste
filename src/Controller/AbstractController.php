<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use League\Tactician\CommandBus;

class AbstractController extends AbstractFOSRestController implements ClassResourceInterface
{
    /**
     * @var CommandBus
     */
    public $commandBus;

    public function __construct(CommandBus $commandBus){
        $this->commandBus = $commandBus;
    }
}