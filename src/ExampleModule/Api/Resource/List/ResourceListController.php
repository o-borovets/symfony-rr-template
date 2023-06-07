<?php

declare(strict_types=1);

namespace App\ExampleModule\Api\Resource\List;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class ResourceListController
{
    #[Route(path: '/api/v1/resources', methods: ['GET'])]
    public function __invoke(
        #[MapQueryString] ResourceListQuery $query,
    ): Response {
        return new Response();
    }
}
