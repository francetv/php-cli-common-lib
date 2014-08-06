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

use Ftven\Build\Common\Service\Base\AbstractTestCase;
use Symfony\Component\Yaml\Dumper;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait SymfonyYamlDumperMockerTrait
{
    /**
     * @param array $calls
     *
     * @return Dumper
     */
    protected function getSymfonyYamlDumperMock($calls = [])
    {
        /** @var AbstractTestCase $this  */
        return $this->getEnhancedMock(
            'Symfony\\Component\\Yaml\\Dumper',
            $calls
        );
    }
    /**
     * @return Dumper
     */
    protected function getSymfonyYamlDumperPopulated()
    {
        return new Dumper();
    }
}