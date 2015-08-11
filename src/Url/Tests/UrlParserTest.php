<?php

namespace Url\Tests;

use Url\Parsers\UrlParser;

class UrlParserTest extends \PHPUnit_Framework_TestCase
{
    public $correctUrl = 'http://andrey@example.com:80/test?query';
    public $correctUrlWithoutScheme = 'andrey@example.com:80/test?query';
    public $relativeUrl = '/test?query';
    public $relativeUrl1Level = './test?query';
    public $relativeUrl2Level = '../test?query';

    public function testGetProtocol()
    {
        $urlParser = new UrlParser($this->correctUrl);
        $protocol = $urlParser->getProtocol();
        $this->assertEquals($protocol, 'HTTP');
    }

    public function testGetUser()
    {
        $urlParser = new UrlParser($this->correctUrl);
        $user = $urlParser->getUser();
        $this->assertEquals($user, 'andrey');
    }

    public function testGetQuery()
    {
        $urlParser = new UrlParser($this->correctUrl);
        $query = $urlParser->getQuery();
        $this->assertEquals($query, 'query');
    }

    public function testGetHost()
    {
        $urlParser = new UrlParser($this->correctUrl);
        $host = $urlParser->getHost();
        $this->assertEquals($host, 'example.com');
    }

    public function testGetPort()
    {
        $urlParser = new UrlParser($this->correctUrl);
        $port = $urlParser->getPort();
        $this->assertEquals($port, '80');
    }

    public function testGetPath()
    {
        $urlParser = new UrlParser($this->correctUrl);
        $path = $urlParser->getPath();
        $this->assertEquals($path, '/test');
    }

    public function testToString()
    {
        $urlParser = new UrlParser($this->correctUrl);
        $resUrl = (string) $urlParser;
        $this->assertEquals($resUrl, $this->correctUrl);
    }

    public function testCorrectUrlWithoutScheme(){
        $urlParser = new UrlParser($this->correctUrlWithoutScheme);
        $this->assertEquals($urlParser->getProtocol(), '');
        $this->assertEquals($urlParser->getHost(), 'example.com');
        $this->assertEquals($urlParser->getUser(), 'andrey');
        $this->assertEquals($urlParser->getPort(), '80');
        $this->assertEquals($urlParser->getPath(), '/test');
        $this->assertEquals($urlParser->getQuery(), 'query');
    }

    public function testRelativeUrl(){
        $urlParser = new UrlParser($this->relativeUrl);
        $this->assertEquals($urlParser->getProtocol(), '');
        $this->assertEquals($urlParser->getHost(), '');
        $this->assertEquals($urlParser->getUser(), '');
        $this->assertEquals($urlParser->getPort(), '');
        $this->assertEquals($urlParser->getPath(), '/test');
        $this->assertEquals($urlParser->getQuery(), 'query');
    }

    public function testRelativeUrl1evel(){
        $urlParser = new UrlParser($this->relativeUrl1Level);
        $this->assertEquals($urlParser->getProtocol(), '');
        $this->assertEquals($urlParser->getHost(), '');
        $this->assertEquals($urlParser->getUser(), '');
        $this->assertEquals($urlParser->getPort(), '');
        $this->assertEquals($urlParser->getPath(), '/test');
        $this->assertEquals($urlParser->getQuery(), 'query');
    }

    public function testRelativeUrl2evel(){
        $urlParser = new UrlParser($this->relativeUrl2Level);
        $this->assertEquals($urlParser->getProtocol(), '');
        $this->assertEquals($urlParser->getHost(), '');
        $this->assertEquals($urlParser->getUser(), '');
        $this->assertEquals($urlParser->getPort(), '');
        $this->assertEquals($urlParser->getPath(), '/test');
        $this->assertEquals($urlParser->getQuery(), 'query');
    }

}
