<?php
/**
 * Created by IntelliJ IDEA.
 * User: bella
 * Date: 2019-11-27
 * Time: 14:10
 */

namespace OrderHandler\ApolloOpenApi;

/**
 * Class ApiFactory
 *
 * @method static \OrderHandler\ApolloOpenApi\Api\Base   base(array $config)
 * @method static \OrderHandler\ApolloOpenApi\Api\Configuration   configuration(array $config)
 * @method static \OrderHandler\ApolloOpenApi\Api\Namespaces   namespaces(array $config)
 */
class ApiFactory
{

    /**
     * @param $name
     * @param array $config
     * @return mixed
     *
     * $base = ApiFactory::base($config)
     * $base->getApp($appId);
     */
    public static function make($name, array $config)
    {

        $name = ucwords($name);
        $application = "\\OrderHandler\\ApolloOpenApi\\Api\\$name";
        $config = new Configure($config);
        return new $application($config);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}