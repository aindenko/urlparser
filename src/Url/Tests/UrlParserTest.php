<?php

namespace Url\Tests;

use Url\Parsers\UrlParser;

class UrlParserTest extends \PHPUnit_Framework_TestCase{

    public $correctUrl = "http://andrey@example.com:80/test?query";

    public function testGetProtocol(){

        $urlParser = new UrlParser($this->correctUrl);
        $protocol = $urlParser->getProtocol();
        $this->assertEquals($protocol,'HTTP');

   }

}
