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
use Ftven\Build\Common\Service\Filesystem\FilesystemService;
use Ftven\Build\Common\Service\Yaml\YamlService;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait YamlServiceMockerTrait
{
    use FilesystemServiceMockerTrait;
    use SymfonyYamlParserMockerTrait;
    use SymfonyYamlDumperMockerTrait;
    /**
     * @param array $calls
     *
     * @return FilesystemService
     */
    protected function getYamlServiceMock($calls = [])
    {
        /** @var AbstractTestCase $this  */
        return $this->getEnhancedMock(
            'Ftven\\Build\\Common\\Service\\Yaml\\YamlService',
            $calls
        );
    }
    /**
     * @return YamlService
     */
    protected function getYamlServicePopulated()
    {
        $s = new YamlService();
        $s->setFilesystemService($this->getFilesystemServicePopulated());
        $s->setYamlDumper($this->getSymfonyYamlDumperPopulated());
        $s->setYamlParser($this->getSymfonyYamlParserPopulated());

        return $s;
    }
}