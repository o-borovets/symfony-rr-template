<?php

namespace App\ExampleModule\Api\Resource\Create;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class ResourceCreateController
{
    public function __construct()
    {
    }

    #[Route(path: '/api/v1/resources', methods: ['POST'])]
    public function __invoke(): Response
    {

    }
}
