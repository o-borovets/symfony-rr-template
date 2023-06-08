<?php

declare(strict_types=1);

namespace App\ExampleModule\Api\Resource\List;

use App\ExampleModule\Domain\Resource\Reader\ResourceReaderInterface;
use App\ExampleModule\Domain\Resource\Reader\ResourceReaderQuery;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[AsController]
class ResourceListController
{
    public function __construct(
        private readonly ResourceReaderInterface $reader,
        private readonly SerializerInterface $serializer,
    )
    {
    }

    #[Route(path: '/api/v1/resources', methods: ['GET'])]
    public function __invoke(
        #[MapQueryString] ResourceReaderQuery $query,
    ): Response {
        $result = $this->reader->handle($query);

        return new Response($this->serializer->serialize($result, 'json'));
    }
}
