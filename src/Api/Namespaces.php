<?php
/**
 * Created by IntelliJ IDEA.
 * User: bella
 * Date: 2019-11-27
 * Time: 13:44
 */

namespace OrderHandler\ApolloOpenApi\Api;


use OrderHandler\ApolloOpenApi\Kernel\BasicApi;
use OrderHandler\ApolloOpenApi\Kernel\Str;

class Namespaces extends BasicApi
{


    /**
     * 获取集群下所有Namespace信息接口
     */
    const GET_ALL_NAMESPACE = "{portal_address}/openapi/v1/envs/{env}/apps/{appId}/clusters/{clusterName}/namespaces";

    /**
     * 获取某个Namespace信息接口
     */
    const GET_ONE_NAMESPACE = "{portal_address}/openapi/v1/envs/{env}/apps/{appId}/clusters/{clusterName}/namespaces/{namespaceName}";

    /**
     * 创建Namespace
     */
    const CREATE_NAMESPACE = "{portal_address}/openapi/v1/apps/{appId}/appnamespaces";

    /**
     * 获取某个Namespace当前编辑人接口
     */
    const GET_NAMESPACE_STATUS = "{portal_address}/openapi/v1/envs/{env}/apps/{appId}/clusters/{clusterName}/namespaces/{namespaceName}/lock";


    /**
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',
     *              'namespaceName' => 'NAMESPACENAME'];
     * @return array
     *
     *  @throws \InvalidArgumentException
     */
    public function getOne(array $url_params)
    {

      return $this->send('GET',$url_params,self::GET_ONE_NAMESPACE);
    }

    /**
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',];
     * @return array
     *
     */
    public function getAll(array $url_params)
    {
        return $this->send('GET',$url_params,self::GET_ALL_NAMESPACE);
    }

    /**
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',
     *              'namespaceName' => 'NAMESPACENAME'];
     * @return array
     *
     */
    public function getStatus($url_params)
    {
        return $this->send('GET',$url_params,self::GET_NAMESPACE_STATUS);
    }

    /**
     * @param $appId
     * @param $requestBody
     * @return array
     *
     */
    public function create($appId, $requestBody)
    {
        $url_params = [
            'portal_address' => $this->config->getPortalAddress(),
            'appId' => $appId,
        ];
        $url = Str::urlMerge($url_params, self::CREATE_NAMESPACE);
        return $this->httpPost($url, $requestBody);
    }
}