<?php
/**
 * Created by IntelliJ IDEA.
 * User: bella
 * Date: 2019-11-27
 * Time: 13:50
 */

namespace OrderHandler\ApolloOpenApi;

class UrlParamsConfig
{
    public $portal_address;

    public $appId;

    public $env;

    public $clusterName;

    public $namespaceName;

    public $key;

    public $operator;

    public function __construct($config)
    {

        $this->env = isset($config['env']) && !empty($config['env']) ? $config['env'] : NULL;

        $this->key = isset($config['key']) && !empty($config['key']) ? $config['key'] : NULL;

        $this->appId = isset($config['appId']) && !empty($config['appId']) ? $config['appId'] : NULL;

        $this->operator = isset($config['operator']) && !empty($config['operator']) ? $config['operator'] : NULL;

        $this->clusterName = isset($config['clusterName']) && !empty($config['clusterName']) ? $config['clusterName'] : NULL;

        $this->namespaceName = isset($config['namespaceName']) && !empty($config['namespaceName']) ? $config['namespaceName'] : NULL;

        $this->portal_address = isset($config['portal_address']) && !empty($config['portal_address']) ? $config['portal_address'] : NULL;

    }
}