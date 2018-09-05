<?php

namespace Barnebys\ImageProcessor;

/**
 * Class UrlHelper
 * @package Barnebys\ImageProcessor
 */
final class UrlHelper
{
    const VERSION = '1.0';

    private $path;
    private $params;
    private $secret;

    public function __construct($path, $params, $secret)
    {
        $this->path = $path;
        $this->params = $params;
        $this->secret = $secret;
    }

    private function getQuery()
    {
        $query = '/' . urlencode($this->path);

        if (count($this->params) > 0) {
            $query .= '?' . http_build_query($this->params);
        }


        return $query . (count($this->params) > 0 ? '&' : '?') . "s=" . md5($this->secret . $query);
    }

    public function __toString()
    {
        return $this->getQuery();
    }

}