# PHP COMMON LIB

[![Build Status](https://travis-ci.org/francetv/php-common-lib.svg?branch=master)](https://travis-ci.org/francetv/php-common-lib)

## Usage

Add the dependency in your composer.json :

    ...
    "require": {
        ...
        "ftven/common-lib": "1.*"
    }

Then update your dependency :

    $ ./composer.phar update ftven/common-lib

Then you can use it directly in your scripts :

    <?php

    // ...

    require_once '/path/to/vendor/autoload.php';

    $filesystem = new Ftven\Build\Common\Service\Filesystem\FilesystemService();
    $filesystem->setFilesystem(new Symfony\Component\Filesystem\Filesystem());

    $content = $filesystem->readFile('/my/file');

    // ...

Enjoy !

FTVEN Build Team.
