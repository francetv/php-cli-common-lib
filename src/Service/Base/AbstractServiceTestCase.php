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

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
abstract class AbstractServiceTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var mixed
     */
    protected $service;
    /**
     * @return string
     */
    protected function getTestClass()
    {
        return get_class($this);
    }
    /**
     * @return mixed
     */
    protected function getServiceClass()
    {
        return preg_replace('/Test$/', '', $this->getTestClass());
    }
    /**
     * @return mixed
     */
    protected function getService()
    {
        return $this->service;
    }
    /**
     *
     */
    public function setUp()
    {
        $serviceClass = $this->getServiceClass();

        $this->service = new $serviceClass;
    }
    /**
     *
     */
    public function testConstruct()
    {
        $this->assertEquals($this->getServiceClass(), get_class($this->service));
    }
}