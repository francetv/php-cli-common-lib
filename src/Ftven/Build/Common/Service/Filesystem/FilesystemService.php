<?php

/*
 * This file is part of the Cli-common LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Filesystem;

use Ftven\Build\Common\Feature\SymfonyFilesystemAwareTrait;
use Ftven\Build\Common\Feature\ExceptionThrowerTrait;
use RuntimeException;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class FilesystemService implements FilesystemServiceInterface
{
    use SymfonyFilesystemAwareTrait;
    use ExceptionThrowerTrait;
    /**
     * @param string $path
     * @param int    $mode
     *
     * @return $this
     *
     * @throws RuntimeException
     */
    public function createDirectory($path, $mode = 0777)
    {
        $this->getFilesystem()->mkdir($path, $mode);

        return $this;
    }
    /**
     * @param string $path
     *
     * @return string
     *
     * @throws RuntimeException
     *
     * @todo do not use directly file_get_contents()
     */
    public function readFile($path)
    {
        return file_get_contents($path);
    }
    /**
     * @param string $path
     * @param string $content
     * @param int    $mode
     *
     * @return $this
     *
     * @throws RuntimeException
     */
    public function writeFile($path, $content, $mode = 0666)
    {
        $this->getFilesystem()->dumpFile($path, $content, $mode);

        return $this;
    }
    /**
     * @param array|string|\Traversable $files
     *
     * @return bool
     */
    public function exists($files)
    {
        return $this->getFilesystem()->exists($files);
    }
    /**
     * @param string $path
     *
     * @return $this
     */
    public function deleteFile($path)
    {
        if (false === $this->exists($path)) {
            return $this;
        }

        $this->getFilesystem()->remove($path);

        return $this;
    }
    /**
     * @param string $path
     *
     * @return $this
     */
    public function deleteDirectory($path)
    {
        if (false === $this->exists($path)) {
            return $this;
        }

        $this->getFilesystem()->remove($path);

        return $this;
    }
}