<?php

/*
 * This file is part of the Cli-common LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\UpdateManager;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
interface UpdateManagerServiceInterface
{
    /**
     * @param string $managerClass
     *
     * @return $this
     */
    public function setManagerClass($managerClass);
    /**
     * @return string
     */
    public function getManagerClass();
    /**
     * @param string $version
     * @param string $manifestFile
     *
     * @return $this
     */
    public function update($version, $manifestFile);
}