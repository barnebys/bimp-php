[![Latest Stable Version](https://poser.pugx.org/barnebys/bimp-php/v/stable)](https://packagist.org/packages/barnebys/bimp-php)
[![Build Status](https://travis-ci.org/barnebys/bimp-php.svg?branch=master)](https://travis-ci.org/barnebys/bimp-php)
[![Coverage Status](https://coveralls.io/repos/github/barnebys/bimp-php/badge.svg?branch=master)](https://coveralls.io/github/barnebys/https://travis-ci.org/barnebys/bimp-php?branch=master)

# Barnebys Image Processor

This is an helper for PHP to build image URL for [Barnebys Image Processor](https://github.com/barnebys/bimp) with ease.

## Resize image

```
// Create the URL Builder with your bimp domain & secret
$urlBuilder = new UrlBuilder('bimp.yourdomain.com', 'test');
$urlBuilder->setWidth(200);

// Get the signed image URL
$url = $urlBuilder->createURL();
```

## Crop image

```
$urlBuilder = new UrlBuilder('bimp.yourdomain.com', 'test');
$urlBuilder->setSize(200,200);        
``` 

## Crop image and set gravity

```
$urlBuilder = new UrlBuilder('bimp.yourdomain.com', 'test');
$urlBuilder
    ->setSize(200,200)
    ->setCrop('north');        
``` 

See [Barnebys Image Processor](https://github.com/barnebys/bimp) for documentation for available crop gravities & strategies.  