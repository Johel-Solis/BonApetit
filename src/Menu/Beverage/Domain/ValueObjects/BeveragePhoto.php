<?php
declare(strict_types=1);

namespace Src\Menu\Beverage\Domain\ValueObjects;
use InvalidArgumentException;

final class BeveragePhoto
{

    private $value;

    public function __construct(string $photo)
    {
        $this->validate($photo);
        $this->value = $photo;
    }

    private function validate(string $photo): void
    {

        if (empty($photo)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $photo)
            );
        }
    }

    public function value(): string
    {
        return $this->value;
    }
    
 }


