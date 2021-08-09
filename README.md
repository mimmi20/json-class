# json-class

This class add a class wrapper around [daverandom/exceptional-json](https://github.com/DaveRandom/ExceptionalJSON) to make mocking easier.

[![Latest Stable Version](https://poser.pugx.org/mimmi20/json-class/v/stable?format=flat-square)](https://packagist.org/packages/mimmi20/json-class)
[![Latest Unstable Version](https://poser.pugx.org/mimmi20/json-class/v/unstable?format=flat-square)](https://packagist.org/packages/mimmi20/json-class)
[![License](https://poser.pugx.org/mimmi20/json-class/license?format=flat-square)](https://packagist.org/packages/mimmi20/json-class)

## Code Status

[![codecov](https://codecov.io/gh/mimmi20/json-class/branch/master/graph/badge.svg)](https://codecov.io/gh/mimmi20/json-class)
[![Average time to resolve an issue](http://isitmaintained.com/badge/resolution/mimmi20/json-class.svg)](http://isitmaintained.com/project/mimmi20/json-class "Average time to resolve an issue")
[![Percentage of issues still open](http://isitmaintained.com/badge/open/mimmi20/json-class.svg)](http://isitmaintained.com/project/mimmi20/json-class "Percentage of issues still open")


## Requirements

This library requires PHP 7.4+.

## Installation

Run the command below to install via Composer

```shell
composer require mimmi20/json-class
```

## Usage

```php
$json    = new \JsonClass\Json();
$decoded = $json->decode();
```

See also [daverandom/exceptional-json's documentation](https://raw.githubusercontent.com/DaveRandom/ExceptionalJSON/master/readme.md)

## Issues and feature requests

Please report your issues and ask for new features on the GitHub Issue Tracker
at https://github.com/mimmi20/json-class/issues
