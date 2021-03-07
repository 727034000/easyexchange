<?php

namespace EasyExchange\Huobi\Wallet;

use EasyExchange\Huobi\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 充币地址查询.
     *
     * @param $currency
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function depositAddress($currency)
    {
        return $this->httpGet('/v2/account/deposit/address', compact('currency'), 'SIGN');
    }

    /**
     * 提币地址查询.
     *
     * @param $params
     *
     * @return array|\EasyExchange\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyExchange\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function withdrawAddress($params)
    {
        return $this->httpGet('/v2/account/withdraw/address', $params, 'SIGN');
    }
}
