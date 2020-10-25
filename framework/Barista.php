<?php

namespace Gaibz\CoffeePHP;

use Gaibz\CoffeePHP\IO\Psr7\Request;

/**
 * Class Barista
 * This is the barista who brew the coffee into something awesome
 *
 * @author Herlangga Sefani <herlangga.sefani@gmail.com>
 * @package Gaibz\CoffeePHP
 */
class Barista
{

    /**
     * Brew CoffeePHP
     * This is a startup script for initializing this framework
     */
    public static function brew() : void
    {
        require_once __DIR__ . '/constants.php';
    }

}