<?php

/*
 * This file is part of the COMMON LIB package
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Feature\ServiceAware;

use Ftven\Build\Common\Service\Phpunit\PhpunitServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait PhpunitServiceAwareTrait
{
    /**
     * @var PhpunitServiceInterface
     */
    protected $phpunitService;
    /**
     * @param PhpunitServiceInterface $phpunitService
     *
     * @return $this
     */
    public function setPhpunitService(PhpunitServiceInterface $phpunitService)
    {
        $this->phpunitService = $phpunitService;

        return $this;
    }
    /**
     * @return PhpunitServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getPhpunitService()
    {
        if (null === $this->phpunitService) {
            throw new \RuntimeException('PHPUnit service not set', 500);
        }

        return $this->phpunitService;
    }
}