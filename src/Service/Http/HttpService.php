<?php

/*
 * This file is part of the COMMON LIB package
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Http;

use Ftven\Build\Common\Feature\GuzzleClientAwareTrait;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class HttpService implements HttpServiceInterface
{
    use GuzzleClientAwareTrait;
    /**
     * @param string      $url
     * @param string      $method
     * @param array       $headers
     * @param null|string $body
     * @param array       $options
     *
     * @return array
     */
    public function request($url, $method = 'GET', $headers = [], $body = null, $options = [])
    {
        $request = $this->getGuzzleClient()->createRequest($method, $url);

        $response = $this->getGuzzleClient()->send($request);

        return [
            'code'    => $response->getStatusCode(),
            'headers' => $response->getHeaders(),
            'body'    => (string)$response->getBody(),
        ];
    }
}