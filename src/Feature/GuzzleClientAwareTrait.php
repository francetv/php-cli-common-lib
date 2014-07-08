<?php

/*
 * This file is part of the COMMON LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Feature;

use GuzzleHttp\ClientInterface;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
trait GuzzleClientAwareTrait
{
    /**
     * @var ClientInterface
     */
    protected $guzzleClient;

    /**
     * @param ClientInterface $guzzleClient
     *
     * @return $this;
     */
    public function setGuzzleClient(ClientInterface $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;

        return $this;
    }
    /**
     * @return ClientInterface
     *
     * @throws \RuntimeException
     */
    public function getGuzzleClient()
    {
        if (null === $this->guzzleClient) {
            throw new \RuntimeException('No Guzzle Client set', 500);
        }

        return $this->guzzleClient;
    }

}