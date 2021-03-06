<?php

/*
 * This file is part of the COMMON LIB package
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Filesystem;

use RuntimeException;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
interface FilesystemServiceInterface
{
    /**
     * @param string $path
     * @param int    $mode
     *
     * @return $this
     *
     * @throws RuntimeException
     */
    public function createDirectory($path, $mode = 0777);
    /**
     * @param string $path
     *
     * @return string
     *
     * @throws RuntimeException
     */
    public function readFile($path);
    /**
     * @param string $path
     * @param string $content
     * @param int    $mode
     *
     * @return $this
     *
     * @throws RuntimeException
     */
    public function writeFile($path, $content, $mode = 0666);
    /**
     * @param array|string|\Traversable $files
     *
     * @return bool
     */
    public function exists($files);
    /**
     * @param string $path
     *
     * @return $this
     */
    public function deleteFile($path);
    /**
     * @param string $path
     *
     * @return $this
     */
    public function deleteDirectory($path);
    /**
     * @param string      $dir
     * @param null|string $prefix
     *
     * @return string
     */
    public function createRandomFile($dir, $prefix = null);
}