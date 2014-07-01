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

use Ftven\Build\Common\Service\Json\JsonServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait JsonServiceAwareTrait
{
    /**
     * @var JsonServiceInterface
     */
    protected $jsonService;
    /**
     * @param JsonServiceInterface $jsonService
     *
     * @return $this
     */
    public function setJsonService(JsonServiceInterface $jsonService)
    {
        $this->jsonService = $jsonService;

        return $this;
    }
    /**
     * @return JsonServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getJsonService()
    {
        if (null === $this->jsonService) {
            throw new \RuntimeException('Json service not set', 500);
        }

        return $this->jsonService;
    }
}