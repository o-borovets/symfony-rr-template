<?php

declare(strict_types=1);

namespace App\ExampleModule\Api\Resource\Get;

use App\ExampleModule\Domain\Resource\Reader\ResourceReaderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Uid\Uuid;

#[AsController]
class ResourceDetailController
{
    private ResourceReaderInterface $reader;

    private SerializerInterface $serializer;

    public function __construct(ResourceReaderInterface $reader, SerializerInterface $serializer)
    {
        $this->reader = $reader;
        $this->serializer = $serializer;
    }

    #[Route(path: '/api/v1/resources/{id}', methods: ['GET'])]
    public function __invoke(
        #[MapQueryParameter('id')] Uuid $id
    ): Response {
        return new Response(
            $this->serializer->serialize(
                $this->reader->one($id),
                'json',
            )
        );
    }
}
