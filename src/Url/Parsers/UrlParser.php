<?php

namespace Url\Parsers;

/**
 * Class UrlParser
 * @package Url\Parsers
 */
class UrlParser {

    private $url;
    private $protocol = '';
    private $port = '';
    private $user = '';
    private $query = '';
    private $host = '';

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

        //parse protocol
        if(isset($res['scheme'])){
            if(in_array($res['scheme'],array_keys($this->protocolSchemas))){
                $this->protocol = $this->protocolSchemas[$res['scheme']];
            } else {
                throw new \Exception("Given protocol not detected");
            }
        }
        //parse user
        if(isset($res['user'])){
            $this->user = $res['user'];
        }

        //parse host
        if(isset($res['host'])){
            $this->host = $res['host'];
        }

        //parse port
        if(isset($res['port'])){
            $this->port = $res['port'];
        }

        //parse query
        if(isset($res['query'])){
            $this->query = $res['query'];
        }

    }

    /**
     * Getter for protocol
     *
     * @return mixed
     */
    public function getProtocol(){
        return $this->protocol;
    }

    /**
     * Getter for user
     *
     * @return mixed
     */
    public function getUser(){
        return $this->user;
    }


    /**
     * Getter for port
     *
     * @return mixed
     */
    public function getPort(){
        return $this->port;
    }


    /**
     * Getter for query
     *
     * @return mixed
     */
    public function getQuery(){
        return $this->query;
    }

    /**
     * Getter for host
     *
     * @return mixed
     */
    public function getHost(){
        return $this->host;
    }

}



