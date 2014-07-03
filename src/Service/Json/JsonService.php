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

use Ftven\Build\Common\Feature\ServiceAware\FilesystemServiceAwareTrait;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class JsonService implements JsonServiceInterface
{
    use FilesystemServiceAwareTrait;
    /**
     * @param string $path
     *
     * @return array
     */
    public function parseFile($path)
    {
        return $this->parse($this->getFilesystemService()->readFile($path));
    }
    /**
     * @param string $raw
     *
     * @return array
     */
    public function parse($raw)
    {
        return json_decode($raw, true);
    }
    /**
     * @param array $data
     * @param int   $depth
     *
     * @return string
     */
    public function dump($data, $depth = 512)
    {
        return json_encode($data, JSON_PRETTY_PRINT, $depth);
    }
}