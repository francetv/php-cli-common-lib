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

use Ftven\Build\Common\Service\System\SystemServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait SystemServiceAwareTrait
{
    /**
     * @var SystemServiceInterface
     */
    protected $systemService;
    /**
     * @param SystemServiceInterface $systemService
     *
     * @return $this
     */
    public function setSystemService(SystemServiceInterface $systemService)
    {
        $this->systemService = $systemService;

        return $this;
    }
    /**
     * @return SystemServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getSystemService()
    {
        if (null === $this->systemService) {
            throw new \RuntimeException('System service not set', 500);
        }

        return $this->systemService;
    }
}