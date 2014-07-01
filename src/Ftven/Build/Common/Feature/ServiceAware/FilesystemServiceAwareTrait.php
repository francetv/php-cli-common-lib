<?php

/*
 * This file is part of the Cli-common LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Feature\ServiceAware;

use Ftven\Build\Common\Service\Filesystem\FilesystemServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait FilesystemServiceAwareTrait
{
    /**
     * @var FilesystemServiceInterface
     */
    protected $filesystemService;
    /**
     * @param FilesystemServiceInterface $filesystemService
     *
     * @return $this
     */
    public function setFilesystemService(FilesystemServiceInterface $filesystemService)
    {
        $this->filesystemService = $filesystemService;

        return $this;
    }
    /**
     * @return FilesystemServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getFilesystemService()
    {
        if (null === $this->filesystemService) {
            throw new \RuntimeException('Filesystem service not set', 500);
        }

        return $this->filesystemService;
    }
}