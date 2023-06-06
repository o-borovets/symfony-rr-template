<?php

namespace App\ExampleModule\Api\Resource\Get;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class ResourceGetController
{
    public function __construct()
    {
    }

    #[Route(path: '/api/v1/resources/{id}', methods: ['GET'])]
    public function __invoke(
        #[MapQueryParameter('id')] string $id
    ): Response
    {

    }
}
