<?php

namespace Gaibz\CoffeePHP\Http;

use PHPUnit\Framework\TestCase;

class HttpRequestTest extends TestCase
{

    function testGetGet()
    {
        $a = '1';
        $b = '2 2';
        $c = 'abc';
        $d1 = "1";
        $d2 = "2";

        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = 'http://localhost/?a='.urlencode($a).'&b='.urlencode($b).'&c='.urlencode($c)."&d[]="
            .urlencode($d1)."&d[]=".urlencode($d2);
        $request = new Request();

        $this->assertArrayHasKey('a', $request->getGet());
        $this->assertArrayHasKey('b', $request->getGet());
        $this->assertArrayHasKey('c', $request->getGet());
        $this->assertArrayHasKey('d', $request->getGet());

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals($a, $request->getGet('a'));
        $this->assertEquals($b, $request->getGet('b'));
        $this->assertEquals($c, $request->getGet('c'));
        $this->assertEquals($d1, $request->getGet('d')[0]);
        $this->assertEquals($d2, $request->getGet('d')[1]);
    }
}