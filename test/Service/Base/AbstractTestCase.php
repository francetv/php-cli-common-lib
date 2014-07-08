<?php

/*
 * This file is part of the COMMON LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Base;

use PHPUnit_Framework_MockObject_MockObject;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $class
     * @param array  $expectedMethodCalls
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    public function getEnhancedMock($class, $expectedMethodCalls = [])
    {
        $methods = [];

        foreach($expectedMethodCalls as $i => $methodCall) {
            $methodCall = array_merge(
                ['method' => 'unknownMethodName', 'params' => null, 'return' => null, 'exception' => null],
                is_array($methodCall) ? $methodCall : []
            );

            $methodName = $methodCall['method'];
            if (false === isset($methods[$methodName])) {
                $methods[$methodName] = 0;
            }
            $methods[$methodName]++;
            $expectedMethodCalls[$i] = $methodCall;
        }

        /** @var \PHPUnit_Framework_TestCase $this */
        $mock = $this->getMock(
            $class,
            array_keys($methods),
            [],
            '',
            false
        );

        $methodCounters = array_fill_keys(array_keys($methods), 0);

        foreach($expectedMethodCalls as $methodCall) {
            $methodName = $methodCall['method'];
            $params     = $methodCall['params'];
            $return     = $methodCall['return'];
            $exception  = $methodCall['exception'];

            $expected = $mock->expects(
                $methods[$methodName] > 1
                    ? $this->at($methodCounters[$methodName] + 1)
                    : $this->once()
            );

            $expected->method($methodName);

            if (null !== $params) {
                call_user_func_array([$expected, 'with'], $params);
            }

            if (null !== $exception) {
                $expected->willThrowException($exception);
            }

            if (null !== $return) {
                $expected->will($this->returnValue($return));
            }
        }

        return $mock;
    }
}