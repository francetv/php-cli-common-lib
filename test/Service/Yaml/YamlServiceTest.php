<?php

/*
 * This file is part of the COMMON LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Yaml;

use Ftven\Build\Common\Service\Base\AbstractServiceTestCase;
use Ftven\Build\Common\Feature\YamlServiceMockerTrait;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class YamlServiceTest extends AbstractServiceTestCase
{
    use YamlServiceMockerTrait;
    /**
     * @return YamlService
     */
    protected function getService()
    {
        return parent::getService();
    }
    /**
     * @group unit
     */
    public function testParseFile()
    {
        $this->getService()->setFilesystemService($this->getFilesystemServiceMock([
            ['method' => 'readFile', 'params' => ['myfile.yaml'], 'return' => 'a: b'],
        ]));
        $this->getService()->setYamlParser($this->getSymfonyYamlParserMock([
            ['method' => 'parse', 'params' => ['a: b'], 'return' => ['a' => 'b']],
        ]));

        $this->assertEquals(
            ['a' => 'b'],
            $this->getService()->parseFile('myfile.yaml')
        );
    }
    /**
     * @group unit
     */
    public function testDump()
    {
        $this->getService()->setYamlDumper($this->getSymfonyYamlDumperMock([
            ['method' => 'dump', 'params' => [['a' => 'b'], 20], 'return' => 'a: b'],
        ]));

        $this->assertEquals('a: b', $this->getService()->dump(['a' => 'b']));
    }
    /**
     * @group integ
     */
    public function testDumpNotMocked()
    {
        $this->assertEquals(
            "a: b\n",
            $this->getYamlServicePopulated()->dump(['a' => 'b'])
        );

        $this->assertEquals(
            "a:\n    b: c\n",
            $this->getYamlServicePopulated()->dump(['a' => ['b' => 'c']])
        );
    }
}