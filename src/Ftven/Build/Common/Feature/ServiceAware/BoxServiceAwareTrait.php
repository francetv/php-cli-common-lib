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

use Ftven\Build\Common\Service\Box\BoxServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait BoxServiceAwareTrait
{
    /**
     * @var BoxServiceInterface
     */
    protected $boxService;
    /**
     * @param BoxServiceInterface $boxService
     *
     * @return $this
     */
    public function setBoxService(BoxServiceInterface $boxService)
    {
        $this->boxService = $boxService;

        return $this;
    }
    /**
     * @return BoxServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getBoxService()
    {
        if (null === $this->boxService) {
            throw new \RuntimeException('Box service not set', 500);
        }

        return $this->boxService;
    }
}