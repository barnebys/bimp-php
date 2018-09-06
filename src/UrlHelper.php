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

    public function __construct($path, $params, $secret = null)
    {
        $this->path = $path;
        $this->params = $params;
        $this->secret = $secret;
    }

    private function getPath()
    {
        if(filter_var($this->path, FILTER_VALIDATE_URL)) {
            return urlencode($this->path);
        }

        return ltrim($this->path, "/");
    }

    private function getQuery()
    {
        $query = '/' . $this->getPath();

        if (count($this->params) > 0) {
            $query .= '?' . http_build_query($this->params);
        }

        $signed = "s=" . md5($this->secret . $query);

        return $query .  (empty($this->secret) ? "" : (count($this->params) > 0 ? '&' : '?') . $signed);
    }

    public function __toString()
    {
        return $this->getQuery();
    }

}