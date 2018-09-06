<?php

namespace Barnebys\Tests;

use Barnebys\ImageProcessor\UrlBuilder;

class UrlTest extends TestCase
{
    /**
     * @var \Barnebys\ImageProcessor\UrlBuilder
     */
    private $urlBuilder;

    public function setUp()
    {
        $this->urlBuilder = new UrlBuilder('image.barnebys.sh', 'test');
    }

    public function testUrl()
    {

        $urlBuilder = $this->urlBuilder;
        $urlBuilder->setPath('https://dummyimage.com/600x400/000/fff');


        $url = $urlBuilder->createURL();
        $expected = 'https://image.barnebys.sh/https%3A%2F%2Fdummyimage.com%2F600x400%2F000%2Ffff?s=71c3bafb73ed22e3e6055bec4f6bedb8';

        $this->assertEquals($expected, $url);
    }

    public function testUrlWithOptions()
    {

        $urlBuilder = $this->urlBuilder;
        $urlBuilder
            ->setHeight(200)
            ->setWidth(200)
            ->setPath('https://dummyimage.com/600x400/000/fff')
            ->setBg('FFFFFF')
            ->setPadding('10')
            ->setCrop('north');

        $url = $urlBuilder->createURL();
        $expected = 'https://image.barnebys.sh/https%3A%2F%2Fdummyimage.com%2F600x400%2F000%2Ffff?h=200&w=200&bg=FFFFFF&pad=10&crop=north&s=adcb502834516a3cbfb4e8734302c5a1';

        $this->assertEquals($expected, $url);
    }

    public function testUnsignedURL()
    {

        $urlBuilder = $this->urlBuilder = new UrlBuilder('image.barnebys.sh');
        $urlBuilder
                ->setHeight(200)
                ->setWidth(200)
                ->setPath('https://dummyimage.com/600x400/000/fff');


        $url = $urlBuilder->createURL();
        $expected = 'https://image.barnebys.sh/https%3A%2F%2Fdummyimage.com%2F600x400%2F000%2Ffff?h=200&w=200';

        $this->assertEquals($expected, $url);
    }

    public function testToString()
    {

        $urlBuilder = $this->urlBuilder = new UrlBuilder('image.barnebys.sh');
        $urlBuilder->setPath('https://dummyimage.com/600x400/000/fff');


        $url = (string) $urlBuilder;
        $expected = 'https://image.barnebys.sh/https%3A%2F%2Fdummyimage.com%2F600x400%2F000%2Ffff';

        $this->assertEquals($expected, $url);
    }

}