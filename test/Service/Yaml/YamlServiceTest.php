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

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class YamlServiceTest extends AbstractServiceTestCase
{
    /**
     * @return YamlService
     */
    protected function getService()
    {
        return parent::getService();
    }
    /**
     * @param array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getFilesystemMock($methods = [])
    {
        return $this->getMock(
            'Ftven\\Build\\Common\\Service\\Filesystem\\FilesystemService',
            $methods,
            [],
            '',
            false
        );
    }
    /**
     * @param array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getYamlMock($methods = [])
    {
        return $this->getMock(
            'Symfony\\Component\\Yaml\\Yaml',
            $methods,
            [],
            '',
            false
        );
    }
    /**
     * @param array $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getYamlParserMock($methods = [])
    {
        return $this->getMock(
            'Symfony\\Component\\Yaml\\Parser',
            $methods,
            [],
            '',
            false
        );
    }
    /**
     * @group unit
     */
    public function testParseFile()
    {
        $fsMock         = $this->getFilesystemMock(['readFile']);
        $yamlParserMock = $this->getYamlParserMock(['parse']);

        $fsMock->expects($this->once())->method('readFile')->with('myfile.yaml')->will($this->returnValue('{}'));
        $yamlParserMock->expects($this->once())->method('parse')->with('{}')->will($this->returnValue([]));

        $this->getService()->setFilesystemService($fsMock);
        $this->getService()->setYamlParser($yamlParserMock);

        $this->assertEquals([], $this->getService()->parseFile('myfile.yaml'));
    }
}