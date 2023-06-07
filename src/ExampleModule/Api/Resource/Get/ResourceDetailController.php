<?php

declare(strict_types=1);

namespace App\ExampleModule\Api\Resource\Get;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

#[AsController]
class ResourceDetailController
{
    #[Route(path: '/api/v1/resources/{id}', methods: ['GET'])]
    public function __invoke(
        #[MapQueryParameter('id')] Uuid $id
    ): Response {
        return new Response();
    }
}
