<?php

declare(strict_types=1);

namespace Src\Menu\Meat\Application;


use Src\Menu\Meat\Domain\Contracts\MeatRepositoryContract;
use Src\Menu\Meat\Domain\Meat;
use Src\Menu\Meat\Domain\ValueObjects\MeatName;
use Src\Menu\Meat\Domain\ValueObjects\MeatDescription;
use Src\Menu\Meat\Domain\ValueObjects\MeatPhoto;
use Src\Menu\Meat\Domain\ValueObjects\MeatPrecio;


final class CreateMeatUseCase
{
    private $repository;

    public function __construct(MeatRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( string $meatName, string $meatPhoto): void
    {
        $name              = new MeatName($meatName);
        $photo              = new MeatPhoto($meatPhoto);
        
        

        $meat = Meat::create( $name,$photo);

        $this->repository->save($meat);
    }
}
