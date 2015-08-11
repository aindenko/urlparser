<?php

namespace Url\Parsers;

/**
 * Class UrlParser.
 */
class UrlParser
{
    private $url;
    private $protocol = '';
    private $port = '';
    private $user = '';
    private $query = '';
    private $host = '';
    private $path = '';

    private $protocolSchemas = array(
        'http' => 'HTTP',
        'https' => 'HTTPS',
    );

    /**
     * @param $url
     *
     * @throws \Exception
     */
    public function __construct($url)
    {
        if (!empty($url)) {
            $this->url = $this->prepareUrl($url);
        } else {
            throw new \Exception('Url has not to be empty');
        }


        $this->parseUrl($this->url);
    }

    /**
     * Cleanup Url
     *
     * @param $url
     * @return mixed
     */
    private function prepareUrl($url){
        return str_replace(array('../', './'),'/',$url);
    }

    /**
     * Parse Url.
     *
     * @throws \Exception
     */
    private function parseUrl()
    {
        $res = parse_url($this->url);

        //parse protocol
        if (isset($res['scheme'])) {
            if (in_array($res['scheme'], array_keys($this->protocolSchemas))) {
                $this->protocol = $this->protocolSchemas[$res['scheme']];
            } else {
                throw new \Exception('Given protocol not detected');
            }
        }
        //parse user
        if (isset($res['user'])) {
            $this->user = $res['user'];
        }

        //parse host
        if (isset($res['host'])) {
            $this->host = $res['host'];
        }

        //parse port
        if (isset($res['port'])) {
            $this->port = $res['port'];
        }

        //parse query
        if (isset($res['query'])) {
            $this->query = $res['query'];
        }

        //parse path
        if (isset($res['path'])) {
            $this->path = $res['path'];
        }
    }

    /**
     * Getter for protocol.
     *
     * @return mixed
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * Getter for user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Getter for port.
     *
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Getter for query.
     *
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Getter for host.
     *
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Getter for path.
     *
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Magic happens here :).
     *
     * @return string
     */
    public function __toString()
    {
        $url = '';

        $schemas = array_flip($this->protocolSchemas);

        if ($schemas[$this->protocol]) {
            $url .= $schemas[$this->protocol].'://';
        }

        if ($this->user) {
            $url .=  $this->user.'@';
        }

        if ($this->host) {
            $url .=  $this->host;
        }

        if ($this->port) {
            $url .=  ':'.$this->port;
        }

        if ($this->path) {
            $url .=  $this->path;
        }

        if ($this->query) {
            $url .= '?'.$this->query;
        }

        return  $url;
    }
}
