<?php
/**
 * Created by IntelliJ IDEA.
 * User: bella
 * Date: 2019-11-27
 * Time: 13:15
 */

namespace OrderHandler\ApolloOpenApi\Api;

use OrderHandler\ApolloOpenApi\Kernel\BasicApi;
use OrderHandler\ApolloOpenApi\Kernel\Str;

class Base extends BasicApi
{

    /**
     * 获取App的环境，集群信息
     */
    const GET_APP_INFO = "{portal_address}/openapi/v1/apps/{appId}/envclusters";

    public function getApp($appId)
    {

        $url_params = [
            'portal_address' => $this->config->getPortalAddress(),
            'appId' => $appId,
        ];
        $url = Str::urlMerge($url_params,self::GET_APP_INFO);
        return $this->httpGet($url);
    }
}