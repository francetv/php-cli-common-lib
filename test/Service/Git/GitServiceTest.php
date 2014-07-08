<?php

/*
 * This file is part of the COMMON LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Git;

use Ftven\Build\Common\Service\Base\AbstractServiceTestCase;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class GitServiceTest extends AbstractServiceTestCase
{
    /**
     * @return GitService
     */
    protected function getService()
    {
        return parent::getService();
    }

    public function testGetUser()
    {
        $systemMock = $this->getMock(
            'Ftven\\Build\\Common\\Service\\System\\SystemService', ['execute'], [], '', false
        );

        $systemMock->expects($this->at(0))->method('execute')
            ->will($this->returnValue(["the@email\n"]))->with('git config --global --get user.email');
        $systemMock->expects($this->at(1))->method('execute')
            ->will($this->returnValue(["the name\n"]))->with('git config --global --get user.name');

        $this->getService()->setSystemService($systemMock);

        $this->assertEquals(['name' => 'the name', 'email' => 'the@email'], $this->getService()->getUser());
    }
}