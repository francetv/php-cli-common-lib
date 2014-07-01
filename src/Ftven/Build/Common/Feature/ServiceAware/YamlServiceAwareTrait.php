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

use Ftven\Build\Common\Service\Yaml\YamlServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait YamlServiceAwareTrait
{
    /**
     * @var YamlServiceInterface
     */
    protected $yamlService;
    /**
     * @param YamlServiceInterface $yamlService
     *
     * @return $this
     */
    public function setYamlService(YamlServiceInterface $yamlService)
    {
        $this->yamlService = $yamlService;

        return $this;
    }
    /**
     * @return YamlServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getYamlService()
    {
        if (null === $this->yamlService) {
            throw new \RuntimeException('Yaml service not set', 500);
        }

        return $this->yamlService;
    }
}