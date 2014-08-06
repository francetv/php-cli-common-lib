<?php

/*
 * This file is part of the COMMON LIB package
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Feature;

use \Twig_Environment;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait TwigAwareTrait
{
    /**
     * @var \Twig_Environment
     */
    protected $twig;
    /**
     * @param \Twig_Environment $twig
     *
     * @return $this
     */
    public function setTwig(\Twig_Environment $twig)
    {
        $this->twig = $twig;

        return $this;
    }
    /**
     * @return \Twig_Environment
     *
     * @throws \RuntimeException
     */
    public function getTwig()
    {
        if (null === $this->twig) {
            throw new \RuntimeException('Twig Environment not set', 500);
        }

        return $this->twig;
    }
}