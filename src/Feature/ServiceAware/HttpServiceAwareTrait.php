<?php

/*
 * This file is part of the COMMON LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Feature\ServiceAware;

use Ftven\Build\Common\Service\Http\HttpServiceInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait HttpServiceAwareTrait
{
    /**
     * @var HttpServiceInterface
     */
    protected $httpService;
    /**
     * @param HttpServiceInterface $httpService
     *
     * @return $this
     */
    public function setHttpService(HttpServiceInterface $httpService)
    {
        $this->httpService = $httpService;

        return $this;
    }
    /**
     * @return HttpServiceInterface
     *
     * @throws \RuntimeException
     */
    public function getHttpService()
    {
        if (null === $this->httpService) {
            throw new \RuntimeException('Http service not set', 500);
        }

        return $this->httpService;
    }
}