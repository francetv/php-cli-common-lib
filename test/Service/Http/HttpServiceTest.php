<?php

/*
 * This file is part of the COMMON LIB package.
 *
 * (c) France Télévisions Editions Numériques <guillaume.postaire@francetv.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ftven\Build\Common\Service\Http;

use Ftven\Build\Common\Service\Base\AbstractServiceTestCase;

/**
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class HttpServiceTest extends AbstractServiceTestCase
{
    /**
     * @return HttpService
     */
    protected function getService()
    {
        return parent::getService();
    }
    /**
     * @group unit
     */
    public function testRequestHeaders()
    {
        $guzzleClientMock = $this->getMock('GuzzleHttp\\Client', ['createRequest', 'send'], [], '', true);
        $requestMock      = $this->getMock(
            'GuzzleHttp\\Message\\RequestInterface',
            [
                'addHeaders', 'setBody', 'setUrl', 'getUrl', 'getResource',
                'getQuery','setQuery', 'getMethod', 'setMethod','setScheme',
                'getScheme', 'getPort', 'setPort', 'getHost', 'setHost',
                'getPath', 'setPath', '__toString', 'getProtocolVersion',
                'getConfig', 'getBody', 'getHeaders', 'getHeader',
                'hasHeader', 'addHeader', 'setHeader', 'setHeaders',
                'getEmitter', 'removeHeader'
            ],
            [],
            '',
            false
        );
        $responseMock = $this->getMock('GuzzleHttp\\Message\\ResponseInterface',
            [],
            [],
            '',
            false
        );
        $requestMock->expects($this->once())->method('addHeaders')->with(['A' => 'B', 'X-A value' => 'X-B value']);
        $requestMock->expects($this->once())->method('setBody')->with(null);
        $guzzleClientMock->expects($this->once())->method('send')->will($this->returnValue($responseMock));
        $guzzleClientMock->expects($this->once())->method('createRequest')->will($this->returnValue($requestMock));
        $this->getService()->setGuzzleClient($guzzleClientMock);

        $this->getService()->request('GET', 'http://localhost/myuri', ['A' => 'B', 'X-A value' => 'X-B value']);
    }
}