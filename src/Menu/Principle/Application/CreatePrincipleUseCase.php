<?php

declare(strict_types=1);

namespace Src\Menu\Principle\Application;


use Src\Menu\Principle\Domain\Contracts\PrincipleRepositoryContract;
use Src\Menu\Principle\Domain\Principle;
use Src\Menu\Principle\Domain\ValueObjects\PrincipleName;
use Src\Menu\Principle\Domain\ValueObjects\PrinciplePhoto;



final class CreatePrincipleUseCase
{
    private $repository;

    public function __construct(PrincipleRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke( string $principleName, string $principlePhoto): void
    {
        $name              = new PrincipleName($principleName);
        $photo              = new PrinciplePhoto($principlePhoto);
        

        $principle = Principle::create( $name, $photo);

        $this->repository->save($principle);
    }
}
