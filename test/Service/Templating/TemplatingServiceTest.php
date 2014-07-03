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

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class TemplatingServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $s = new TemplatingService();

        $this->assertEquals('Ftven\\Build\\Common\\Service\\Templating\\TemplatingService', get_class($s));
    }
    /**
     * @group integ
     */
    public function testRender()
    {
        $s = new TemplatingService();
        $loader = new \Twig_Loader_Filesystem();
        $s->setTwig(new \Twig_Environment($loader));

        $s->addRepository(__DIR__ . '/templates');

        $this->assertEquals('Hi john DOE !', $s->render('basic.twig', ['name' => 'John', 'lastname' => 'Doe']));
    }
}