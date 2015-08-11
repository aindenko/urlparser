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

    public function testGetUser(){

        $urlParser = new UrlParser($this->correctUrl);
        $user = $urlParser->getUser();
        $this->assertEquals($user,'andrey');

    }

    public function testGetQuery(){

        $urlParser = new UrlParser($this->correctUrl);
        $query = $urlParser->getQuery();
        $this->assertEquals($query,'query');

    }

    public function testGetHost(){

        $urlParser = new UrlParser($this->correctUrl);
        $host = $urlParser->getHost();
        $this->assertEquals($host,'example.com');

    }

    public function testGetPort(){

        $urlParser = new UrlParser($this->correctUrl);
        $port = $urlParser->getPort();
        $this->assertEquals($port,'80');

    }


}
