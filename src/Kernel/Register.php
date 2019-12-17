<?php

namespace OrderHandler\ApolloOpenApi\Kernel;


/**
 * Class Register 注册器类
 * @package OrderHandler\ApolloOpenApi\Kernel
 */
class Register
{

    public static $objects;

    /**
     * 将实例加入注册器中
     *
     * @param string $alias 对象别名
     * @param object $object 对象实例
     */
    public static function set($alias, $object)
    {
        self::$objects[$alias] = $object;
    }

    /**
     * 读取实例
     *
     * @param string $alias 对象别名
     * @return mixed 返回的对象实例
     *
     */
    public static function get($alias)
    {
        if (isset(self::$objects[$alias])) {
            return self::$objects[$alias];
        } else {
            return NULL;
        }

    }

    /**
     * 销毁实例
     *
     * @param string $alias
     *
     */
    public static function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }
}