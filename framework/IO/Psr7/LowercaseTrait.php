<?php

declare(strict_types=1);

namespace Gaibz\CoffeePHP\IO\Psr7;

/**
 * Trait implementing a locale-independent lowercasing logic.
 *
 *
 * @internal should not be used outside of Gaibz\CoffeePHP\IO\Psr7 as it does not fall under our BC promise
 */
trait LowercaseTrait
{
    private static function lowercase(string $value): string
    {
        return \strtr($value, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz');
    }
}
