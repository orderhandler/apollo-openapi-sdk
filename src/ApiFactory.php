<?php
/**
 * Created by IntelliJ IDEA.
 * User: bella
 * Date: 2019-11-27
 * Time: 14:10
 */

namespace OrderHandler\ApolloOpenApi;

use OrderHandler\ApolloOpenApi\Kernel\Register;

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
     * @param string $name 想要调用的method名称
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
        Register::set('config',Configure::getInstance($config));
        return new $application();
    }

    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}