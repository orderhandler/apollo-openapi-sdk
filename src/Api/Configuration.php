<?php
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
     * 添加
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',
     *              'namespaceName' => 'NAMESPACENAME'];
     *
     * @param string $requestBody {"key":"timeout", "value":"3000", "comment":"超时时间", "dataChangeCreatedBy":"zhanglea"}
     * @return array
     *
     */
    public function add(array $url_params, string $requestBody)
    {
        if(!$requestBody){
            throw new \InvalidArgumentException('Attribute RequestBody can not be empty!');
        }
        return $this->send('POST',$url_params,self::ADD_CONFIGURATION, $requestBody);

    }

    /**
     * 更新
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',
     *              'namespaceName' => 'NAMESPACENAME',
     *              'key' => 'KEY'];
     * @param string $requestBody {"key":"timeout", "value":"3000", "comment":"超时时间", "dataChangeLastModifiedBy":"zhanglea"}
     * @return array
     *
     */
    public function update(array $url_params, $requestBody)
    {
        if(!$requestBody){
            throw new \InvalidArgumentException('Attribute RequestBody can not be empty!');
        }
        return $this->send('PUT',$url_params,self::UPDATE_CONFIGURATION, $requestBody);
    }

    /**
     * 删除
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',
     *              'namespaceName' => 'NAMESPACENAME',
     *              'key' => 'KEY',
     *              'operator' => 'OPERATOR'];
     *
     * @return mixed
     *
     */
    public function delete(array $url_params)
    {
        return $this->send('DELETE',$url_params,self::DELETE_CONFIGURATION);
    }

    /**
     * 发布配置
     *
     * @param array $url_params [
     *              'env' => 'ENV',
     *              'appId' => 'APPID',
     *              'clusterName' => 'CLUSTERNAME',
     *              'namespaceName' => 'NAMESPACENAME'];
     *
     * @param string $requestBody{"releaseTitle":"2016-08-11", "releaseComment":"修改timeout值", "releasedBy":"zhanglea"}
     *
     * @return mixed
     *
     */
    public function release(array $url_params, $requestBody)
    {
        if(!$requestBody){
            throw new \InvalidArgumentException('Attribute RequestBody can not be empty!');
        }
        return $this->send('POST',$url_params,self::RELEASE_CONFIGURATION, $requestBody);
    }
}