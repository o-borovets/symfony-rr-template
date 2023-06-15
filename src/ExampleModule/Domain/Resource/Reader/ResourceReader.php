<?php

declare(strict_types=1);

namespace App\ExampleModule\Domain\Resource\Reader;

use App\ExampleModule\Domain\Resource\ResourceRepositoryInterface;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\Uid\Uuid;

#[AsAlias]
class ResourceReader implements ResourceReaderInterface
{
    private ResourceRepositoryInterface $repository;

    public function __construct(ResourceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function list(ResourceReaderQuery $query): ResourceReaderResponse
    {
        $result = $this->repository->find();
        // in real app with doctrine it possible to use queryBuilder here
        // or inject secured query builder thought some factory

        return ResourceReaderResponse::createFromIterable($result);
    }

    public function one(Uuid $id): ResourceDetailsResponse
    {
        $result = $this->repository->get($id);

        return new ResourceDetailsResponse(
            $result->getId(),
            $result->getName(),
            $result->getValue(),
        );
    }
}
