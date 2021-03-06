<?php

declare(strict_types=1);

namespace Src\Menu\Soup\Application;


use Src\Menu\Soup\Domain\Contracts\SoupRepositoryContract;
use Src\Menu\Soup\Domain\Soup;
use Src\Menu\Soup\Domain\ValueObjects\SoupName;
use Src\Menu\Soup\Domain\ValueObjects\SoupPhoto;



final class CreateSoupUseCase
{
    private $repository;

    public function __construct(SoupRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( string $soupName, string $soupPhoto): void
    {
        $name  = new SoupName($soupName);
        $photo = new SoupPhoto($soupPhoto);
        $soup  = Soup::create( $name, $photo);

        $this->repository->save($soup);
    }
}
