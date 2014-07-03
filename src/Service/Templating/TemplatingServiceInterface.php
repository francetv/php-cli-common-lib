<?php

/*
 * This file is part of the COMMON LIB package
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
interface TemplatingServiceInterface
{
    /**
     * @param \Twig_Environment $twig
     *
     * @return $this
     */
    public function setTwig(\Twig_Environment $twig);
    /**
     * @return \Twig_Environment
     *
     * @throws \RuntimeException
     */
    public function getTwig();
    /**
     * @param string $name
     * @param array  $vars
     *
     * @return string
     */
    public function render($name, $vars = []);
    /**
     * @param string      $path
     * @param null|string $namespace
     *
     * @return $this
     */
    public function addRepository($path, $namespace = null);
}