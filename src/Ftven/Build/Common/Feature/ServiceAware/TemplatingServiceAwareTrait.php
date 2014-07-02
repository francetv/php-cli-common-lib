<?php

/*
 * This file is part of the Cli-common LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Feature\ServiceAware;

use Ftven\Build\Common\Service\Templating\TemplatingServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait TemplatingServiceAwareTrait
{
    /**
     * @var TemplatingServiceInterface
     */
    protected $templatingService;
    /**
     * @param TemplatingServiceInterface $templatingService
     *
     * @return $this
     */
    public function setTemplatingService(TemplatingServiceInterface $templatingService)
    {
        $this->templatingService = $templatingService;

        return $this;
    }
    /**
     * @return TemplatingServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getTemplatingService()
    {
        if (null === $this->templatingService) {
            throw new \RuntimeException('Templating service not set', 500);
        }

        return $this->templatingService;
    }
    /**
     * @param string $name
     * @param array  $vars
     *
     * @return string
     */
    protected function renderTemplate($name, $vars = [])
    {
        return $this->getTemplatingService()->render($name, $vars);
    }
}