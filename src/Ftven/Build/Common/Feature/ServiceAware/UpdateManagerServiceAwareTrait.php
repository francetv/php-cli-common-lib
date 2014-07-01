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

use Ftven\Build\Common\Service\UpdateManager\UpdateManagerServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait UpdateManagerServiceAwareTrait
{
    /**
     * @var UpdateManagerServiceInterface
     */
    protected $updateManagerService;
    /**
     * @param UpdateManagerServiceInterface $updateManagerService
     *
     * @return $this
     */
    public function setUpdateManagerService(UpdateManagerServiceInterface $updateManagerService)
    {
        $this->updateManagerService = $updateManagerService;

        return $this;
    }
    /**
     * @return UpdateManagerServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getUpdateManagerService()
    {
        if (null === $this->updateManagerService) {
            throw new \RuntimeException('Update Manager service not set', 500);
        }

        return $this->updateManagerService;
    }
}