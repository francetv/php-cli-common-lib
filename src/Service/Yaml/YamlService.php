<?php

/*
 * This file is part of the COMMON LIB package
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Yaml;

use Ftven\Build\Common\Feature\ServiceAware\FilesystemServiceAwareTrait;
use Ftven\Build\Common\Feature\SymfonyYamlDumperAwareTrait;
use Ftven\Build\Common\Feature\SymfonyYamlParserAwareTrait;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class YamlService implements YamlServiceInterface
{
    use FilesystemServiceAwareTrait;
    use SymfonyYamlParserAwareTrait;
    use SymfonyYamlDumperAwareTrait;
    /**
     * @param string $path
     *
     * @return array
     */
    public function parseFile($path)
    {
        return $this->parse($this->getFilesystemService()->readFile($path));
    }
    /**
     * @param string $raw
     *
     * @return array
     */
    public function parse($raw)
    {
        return $this->getYamlParser()->parse($raw);
    }
    /**
     * @param array $data
     * @param int   $depth
     *
     * @return string
     */
    public function dump($data, $depth = 20)
    {
        return $this->getYamlDumper()->dump($data, $depth);
    }
}