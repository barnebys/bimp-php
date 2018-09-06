<?php

namespace Barnebys\ImageProcessor;

use Barnebys\ImageProcessor\UrlHelper;

/**
 * Class UrlBuilder
 * @package Barnebys\Analytics
 */
final class UrlBuilder
{
    const VERSION = '1.0';

    private $domain;
    private $secret;
    private $path;

    private $params = [];

    public function __construct($domain, $secret = null)
    {
        $this->domain = $domain;
        $this->secret = $secret;
    }

    public function setSize($width, $height)
    {
        $this->setWidth($width)->setHeight($height);

        return $this;
    }

    public function setWidth($width)
    {
        $this->params['w'] = (int) $width;

        return $this;
    }

    public function setHeight($height)
    {
        $this->params['h'] = (int) $height;

        return $this;
    }

    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    public function setCrop($crop)
    {
        $this->params['crop'] = $crop;

        return $this;
    }

    public function setBg($color)
    {
        $this->params['bg'] = $color;

        return $this;
    }

    public function setPadding($padding)
    {
        $this->params['pad'] = $padding;

        return $this;
    }

    public function setTrim($trim)
    {
        $trim = $trim > 100 ? 99 : (int) $trim;
        $this->params['trim'] = $trim;

        return $this;
    }

    public function setExtract($left, $top, $width, $height)
    {
        $this->params['extract'] = implode(',', [
            (int) $left,
            (int) $top,
            (int) $width,
            (int) $height,
        ]);

        return $this;
    }

    public function createURL()
    {
        $query = new UrlHelper($this->path, $this->params, $this->secret);

        return 'https://' . $this->domain . $query;
    }

}