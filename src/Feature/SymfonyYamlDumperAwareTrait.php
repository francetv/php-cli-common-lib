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

use Symfony\Component\Yaml\Dumper;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait SymfonyYamlDumperAwareTrait
{
    /**
     * @var Dumper
     */
    protected $yamlDumper;
    /**
     * @param Dumper $yamlDumper
     *
     * @return $this
     */
    public function setYamlDumper(Dumper $yamlDumper)
    {
        $this->yamlDumper = $yamlDumper;

        return $this;
    }
    /**
     * @return Dumper
     *
     * @throws \RuntimeException
     */
    public function getYamlDumper()
    {
        if (null === $this->yamlDumper) {
            throw new \RuntimeException('Symfony Yaml Dumper not set', 500);
        }

        return $this->yamlDumper;
    }
}