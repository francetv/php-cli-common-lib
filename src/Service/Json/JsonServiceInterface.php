<?php

/*
 * This file is part of the COMMON LIB package
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Json;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
interface JsonServiceInterface
{
    /**
     * @param string $path
     *
     * @return array
     */
    public function parseFile($path);
    /**
     * @param string $raw
     *
     * @return array
     */
    public function parse($raw);
    /**
     * @param array $data
     * @param int   $depth
     *
     * @return string
     */
    public function dump($data, $depth = 512);
}