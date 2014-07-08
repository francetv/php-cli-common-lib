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
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait SymfonyFilesystemMockerTrait
{
    /**
     * @param array $calls
     *
     * @return Filesystem
     */
    protected function getSymfonyFilesystemMock($calls = [])
    {
        /** @var AbstractTestCase $this  */
        return $this->getEnhancedMock(
            'Symfony\\Component\\Filesystem\\Filesystem',
            $calls
        );
    }
    /**
     * @return Filesystem
     */
    protected function getSymfonyFilesystemPopulated()
    {
        return new Filesystem();
    }
}