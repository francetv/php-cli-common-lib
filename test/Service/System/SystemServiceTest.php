<?php

/*
 * This file is part of the COMMON LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\System;

use Ftven\Build\Common\Service\Base\AbstractServiceTestCase;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class SystemServiceTest extends AbstractServiceTestCase
{
    /**
     * @return SystemService
     */
    protected function getService()
    {
        return parent::getService();
    }
    /**
     * @group integration-test
     */
    public function testExecuteForFailingCommandThrowException()
    {
        $this->setExpectedException('RuntimeException', 'Error when executing [exit 1]', 1);

        $this->getService()->execute('exit 1');
    }
    /**
     * @group integration-test
     */
    public function testExecuteForFailingCommandWithExpectedExitCodesDoNotThrowException()
    {
        list($output, $errorOutput, $return) = $this->getService()->execute('echo thetexthere ; exit 2', null, [0, 2]);

        $this->assertEquals('thetexthere' . PHP_EOL, $output);
        $this->assertEquals('', $errorOutput);
        $this->assertEquals(2, $return);
    }
}