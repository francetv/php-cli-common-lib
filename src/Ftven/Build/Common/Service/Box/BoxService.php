<?php

/*
 * This file is part of the Cli-common LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Box;

use Ftven\Build\Common\Feature\ServiceAware\FilesystemServiceAwareTrait;
use Ftven\Build\Common\Feature\ServiceAware\PhpunitServiceAwareTrait;
use Ftven\Build\Common\Feature\ServiceAware\SystemServiceAwareTrait;
use Ftven\Build\Common\Feature\ServiceAware\JsonServiceAwareTrait;
use Ftven\Build\Common\Feature\StringFormatterTrait;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class BoxService implements BoxServiceInterface
{
    use FilesystemServiceAwareTrait;
    use PhpunitServiceAwareTrait;
    use SystemServiceAwareTrait;
    use JsonServiceAwareTrait;
    use StringFormatterTrait;
    /**
     * @param null|string $dir
     * @param null|string $copyTo
     *
     * @return string
     */
    public function package($dir = null, $copyTo = null)
    {
        if (true === $this->getPhpunitService()->hasSupport()) {
            $this->getPhpunitService()->test($dir);
        }

        $this->getSystemService()->execute('bin/box build', $dir);

        $box = $this->getJsonService()->parseFile('box.json');
        $file = $box['output'];

        if (null === $copyTo) {
            return $file;
        }

        $this->getSystemService()->execute($this->_('sudo cp %s %s', $file, $copyTo));

        return $file;
    }
    /**
     * @return bool
     */
    public function hasSupport()
    {
        return $this->getFilesystemService()->exists('box.json') && $this->getFilesystemService()->exists('bin/box');
    }
}