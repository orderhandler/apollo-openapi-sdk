<?php
/**
 * Created by IntelliJ IDEA.
 * User: bella
 * Date: 2019-11-27
 * Time: 13:43
 */

namespace OrderHandler\ApolloOpenApi\Api;


use OrderHandler\ApolloOpenApi\Kernel\BasicApi;

class Configuration extends BasicApi
{

    /**
     * 新增配置接口
     */
    const ADD_CONFIGURATION = "{portal_address}/openapi/v1/envs/{env}/apps/{appId}/clusters/{clusterName}/namespaces/{namespaceName}/items";

    /**
     * 修改配置接口
     */
    const UPDATE_CONFIGURATION = "{portal_address}/openapi/v1/envs/{env}/apps/{appId}/clusters/{clusterName}/namespaces/{namespaceName}/items/{key}";

    /**
     * 删除配置接口
     */
    const DELETE_CONFIGURATION = "{portal_address}/openapi/v1/envs/{env}/apps/{appId}/clusters/{clusterName}/namespaces/{namespaceName}/items/{key}?operator={operator}";

    /**
     *  发布配置接口
     */
    const RELEASE_CONFIGURATION = "{portal_address}/openapi/v1/envs/{env}/apps/{appId}/clusters/{clusterName}/namespaces/{namespaceName}/releases";

    /**
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',
     *              'namespaceName' => 'NAMESPACENAME'];
     * @param $requestBody
     * @return array
     *
     */
    public function add($url_params, $requestBody)
    {

        return $this->send('POST',$url_params,self::ADD_CONFIGURATION, $requestBody);

    }

    /**
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',
     *              'namespaceName' => 'NAMESPACENAME',
     *              'key' => 'KEY'];
     * @param $requestBody
     * @return array
     *
     */
    public function update($url_params, $requestBody)
    {
        return $this->send('PUT',$url_params,self::UPDATE_CONFIGURATION, $requestBody);
    }

    /**
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',
     *              'namespaceName' => 'NAMESPACENAME',
     *              'key' => 'KEY',
     *              'operator' => 'OPERATOR'];
     *
     * @return array
     *
     */
    public function delete($url_params)
    {
        return $this->send('DELETE',$url_params,self::DELETE_CONFIGURATION);
    }

    /**
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',
     *              'namespaceName' => 'NAMESPACENAME'];
     * @param $requestBody
     *
     * @return array
     *
     */
    public function release($url_params, $requestBody)
    {

        return $this->send('POST',$url_params,self::RELEASE_CONFIGURATION, $requestBody);
    }
}