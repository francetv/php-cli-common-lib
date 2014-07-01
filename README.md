# PHP CLI COMMON LIB

## Usage

Add the dependency in your composer.json :

    ...
    "require": {
        ...
        "ftven/php-cli-common-lib": "dev-master"
    }

Then update your dependency :

    $ ./composer.phar update ftven/php-cli-common-lib

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
