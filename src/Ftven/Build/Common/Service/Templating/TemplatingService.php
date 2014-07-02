<?php

/*
 * This file is part of the Cli-common LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Templating;

use Ftven\Build\Common\Feature\ExceptionThrowerTrait;
use Ftven\Build\Common\Feature\TwigAwareTrait;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class TemplatingService implements TemplatingServiceInterface
{
    use ExceptionThrowerTrait;
    use TwigAwareTrait;
    /**
     * @param string $name
     * @param array  $vars
     *
     * @return string
     */
    public function render($name, $vars = [])
    {
        return $this->getTwig()->render($name, $vars);
    }
    /**
     * @param string      $path
     * @param null|string $namespace
     *
     * @return $this
     */
    public function addRepository($path, $namespace = null)
    {
        $loader = $this->getTwig()->getLoader();

        if (false === ($loader instanceof \Twig_Loader_Filesystem)) {
            $this->throwException(500, 'Current twig loader does not support adding template repository');
        }

        /** @var \Twig_Loader_Filesystem $loader */
        $loader->addPath($path, true === isset($namespace) ? $namespace : \Twig_Loader_Filesystem::MAIN_NAMESPACE);

        return $this;
    }
}