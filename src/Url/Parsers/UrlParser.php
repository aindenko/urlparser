<?php

namespace Url\Parsers;

/**
 * Class UrlParser
 * @package Url\Parsers
 */
class UrlParser {

    private $url;
    private $protocol;
    private $port;
    private $username;
    private $query;

    private $protocolSchemas = array(
        'http' => 'HTTP',
        'https'=> 'HTTPS'
    );

    /**
     * @param $url
     * @throws \Exception
     */
    function __construct($url){
        if(!empty($url)) {
            $this->url = $url;
        } else {
            throw new \Exception("Url has not to be empty");
        }
        //TODO remove ./  ../

        $this->parse($this->url);

    }

    /**
     * Parse Url
     *
     * @throws \Exception
     */
    private function parse(){
        $res = parse_url($this->url);
        if(isset($res['scheme'])){
            if(in_array($res['scheme'],array_keys($this->protocolSchemas))){
                $this->protocol = $this->protocolSchemas[$res['scheme']];
            } else {
                throw new \Exception("Given protocol not detected");
            }
        }
    }

    public function getProtocol(){
        return $this->protocol;
    }

}



