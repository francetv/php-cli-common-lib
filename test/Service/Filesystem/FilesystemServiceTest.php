<?php

/*
 * This file is part of the COMMON LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Filesystem;

use Ftven\Build\Common\Feature\FilesystemServiceMockerTrait;
use Ftven\Build\Common\Service\Base\AbstractServiceTestCase;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class FilesystemServiceTest extends AbstractServiceTestCase
{
    use FilesystemServiceMockerTrait;
    /**
     * @return FilesystemService
     */
    protected function getService()
    {
        return parent::getService();
    }
    /**
     * @group unit
     */
    public function testCreateDirectory()
    {
        $this->getService()->setFilesystem($this->getSymfonyFilesystemMock([
            ['method' => 'mkdir', 'params' => ['/my/directory', 0777]],
        ]));

        $this->getService()->createDirectory('/my/directory');
    }
    /**
     * @group unit
     */
    public function testWriteFile()
    {
        $this->getService()->setFilesystem($this->getSymfonyFilesystemMock([
            ['method' => 'dumpFile', 'params' => ['/my/file', 'this is the content']],
        ]));

        $this->getService()->writeFile('/my/file', 'this is the content');
    }
}