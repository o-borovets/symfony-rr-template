<?php

declare(strict_types=1);

namespace App\ExampleModule\Api\Resource\Create;

use App\ExampleModule\Domain\Resource\Create\ResourceCreateCommand;
use App\ExampleModule\Domain\Resource\Create\ResourceCreatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class ResourceCreateController
{
    public function __construct(private readonly ResourceCreatorInterface $resourceCreator)
    {
    }

    #[Route(path: '/api/v1/resources', methods: ['POST'])]
    public function __invoke(
        #[MapRequestPayload] ResourceCreatePayload $payload,
    ): Response {
        // do we really need abstraction about different DTO for http and domain layer?
        // maybe it worth to reduce abstraction level?
        $createData = new ResourceCreateCommand(
            $payload->name,
            $payload->value,
            $payload->id
        );

        $this->resourceCreator->handle($createData);

        return new Response('', Response::HTTP_NO_CONTENT);
    }
}
