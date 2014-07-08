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

use Ftven\Build\Common\Service\Base\AbstractTestCase;
use Ftven\Build\Common\Service\Filesystem\FilesystemService;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait FilesystemServiceMockerTrait
{
    use SymfonyFilesystemMockerTrait;
    /**
     * @param array $calls
     *
     * @return FilesystemService
     */
    protected function getFilesystemServiceMock($calls = [])
    {
        /** @var AbstractTestCase $this  */
        return $this->getEnhancedMock(
            'Ftven\\Build\\Common\\Service\\Filesystem\\FilesystemService',
            $calls
        );
    }
    /**
     * @return FilesystemService
     */
    protected function getFilesystemServicePopulated()
    {
        $fs = new FilesystemService();
        $fs->setFilesystem($this->getSymfonyFilesystemPopulated());

        return $fs;
    }
}