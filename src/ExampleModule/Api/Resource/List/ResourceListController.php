<?php

namespace App\ExampleModule\Api\Resource\List;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class ResourceListController
{
    public function __construct()
    {
    }

    #[Route(path: '/api/v1/resources', methods: ['GET'])]
    public function __invoke(): Response
    {

    }
}
