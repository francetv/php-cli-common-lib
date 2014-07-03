<?php

/*
 * This file is part of the COMMON LIB package
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Feature;

use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait SymfonyFilesystemAwareTrait
{
    /**
     * @var Filesystem
     */
    protected $filesystem;
    /**
     * @param Filesystem $filesystem
     *
     * @return $this
     */
    public function setFilesystem(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;

        return $this;
    }
    /**
     * @return Filesystem
     *
     * @throws \RuntimeException
     */
    public function getFilesystem()
    {
        if (null === $this->filesystem) {
            throw new \RuntimeException('Symfony Filesystem not set', 500);
        }

        return $this->filesystem;
    }
}