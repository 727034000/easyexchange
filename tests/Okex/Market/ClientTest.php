<?php

namespace EasyExchange\Tests\Okex\Market;

use EasyExchange\Okex\Market\Client;
use EasyExchange\Tests\TestCase;

class ClientTest extends TestCase
{
    public function testTickers()
    {
        $client = $this->mockApiClient(Client::class);
        $instType = 'SWAP';
        $uly = 'BTC-USD';
        $params = [
            'instType' => $instType,
            'uly' => $uly,
        ];

        $client->expects()->httpGet('/api/v5/market/tickers', $params)->andReturn('mock-result');

        $this->assertSame('mock-result', $client->tickers($instType, $uly));
    }

    public function testTicker()
    {
        $client = $this->mockApiClient(Client::class);
        $instId = 'BTC-USD-SWAP';
        $params = [
            'instId' => $instId,
        ];

        $client->expects()->httpGet('/api/v5/market/ticker', $params)->andReturn('mock-result');

        $this->assertSame('mock-result', $client->ticker($instId));
    }

    public function testIndexTickers()
    {
        $client = $this->mockApiClient(Client::class);
        $quoteCcy = 'BTC';
        $instId = 'BTC-USD-SWAP';
        $params = [
            'quoteCcy' => $quoteCcy,
            'instId' => $instId,
        ];

        $client->expects()->httpGet('/api/v5/market/index-tickers', $params)->andReturn('mock-result');

        $this->assertSame('mock-result', $client->indexTickers($quoteCcy, $instId));
    }

    public function testDepth()
    {
        $client = $this->mockApiClient(Client::class);

        $client->expects()->httpGet('/api/v5/market/books', [
            'instId' => 'ETHBTC',
            'sz' => 10,
        ])->andReturn('mock-result');

        $this->assertSame('mock-result', $client->depth('ETHBTC', 10));
    }
}
