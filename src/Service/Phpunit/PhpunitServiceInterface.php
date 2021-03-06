<?php

/*
 * This file is part of the COMMON LIB package
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Phpunit;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
interface PhpunitServiceInterface
{
    /**
     * @param null|string $dir
     *
     * @return bool
     */
    public function hasSupport($dir = null);
    /**
     * @param null|string $dir
     *
     * @return $this
     */
    public function test($dir = null);
}