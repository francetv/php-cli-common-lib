<?php

/*
 * This file is part of the Cli-common LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Git;

use RuntimeException;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
interface GitServiceInterface
{
    /**
     * @return string
     *
     * @throws RuntimeException
     */
    public function getUserEmail();
    /**
     * @return string
     *
     * @throws RuntimeException
     */
    public function getUserName();
    /**
     * @return array
     */
    public function getUser();
}