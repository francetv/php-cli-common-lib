<?php

/*
 * This file is part of the COMMON LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Templating;

use Ftven\Build\Common\Service\Base\AbstractServiceTestCase;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class TemplatingServiceTest extends AbstractServiceTestCase
{
    /**
     * @return TemplatingService
     */
    protected function getService()
    {
        return parent::getService();
    }

    /**
     * @group integ
     */
    public function testRender()
    {
        $loader = new \Twig_Loader_Filesystem();
        $this->getService()->setTwig(new \Twig_Environment($loader));

        $this->getService()->addRepository(__DIR__ . '/templates');

        $this->assertEquals('Hi john DOE !', $this->getService()->render('basic.twig', ['name' => 'John', 'lastname' => 'Doe']));
    }
}