<?php

/*
 * This file is part of the Cli-common LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Feature;

use Symfony\Component\Yaml\Yaml;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait SymfonyYamlAwareTrait
{
    /**
     * @var Yaml
     */
    protected $yaml;
    /**
     * @param Yaml $yaml
     *
     * @return $this
     */
    public function setYaml(Yaml $yaml)
    {
        $this->yaml = $yaml;

        return $this;
    }
    /**
     * @return Yaml
     *
     * @throws \RuntimeException
     */
    public function getYaml()
    {
        if (null === $this->yaml) {
            throw new \RuntimeException('Symfony Yaml not set', 500);
        }

        return $this->yaml;
    }
}