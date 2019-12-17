<?php
namespace OrderHandler\ApolloOpenApi\Api;

use OrderHandler\ApolloOpenApi\Kernel\BasicApi;

class Base extends BasicApi
{

    /**
     * 获取App的环境，集群信息
     */
    const GET_APP_INFO = "{portal_address}/openapi/v1/apps/{appId}/envclusters";

    public function getApp(string $appId)
    {

        return $this->send('GET',[
            'appId' => $appId,
        ], self::GET_APP_INFO);
    }
}