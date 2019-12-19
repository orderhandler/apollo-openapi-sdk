<?php
/**
 * Created by IntelliJ IDEA.
 * User: bella
 * Date: 2019-11-27
 * Time: 15:39
 */

namespace OrderHandler\ApolloOpenApi\Kernel;


class Str
{
    protected static $urlCache = [];

    /**
     * 合并url
     *
     * @param array $params
     * @param string $url
     * @return string
     */
    public static function urlMerge(array $params, $url)
    {
        $urlParams = [];

        preg_match_all('/(\{[\S]*?\})/i', $url, $urlParams);
        $url = str_replace($urlParams[0], '%s', $url);

        array_unshift($params, $url);
        $merge_url = call_user_func_array('sprintf', $params);

        return  $merge_url;
    }

    /**
     * 获取url中需要替换的参数
     *
     * @param $url_string
     * @return array
     *
     */
    public static function paramsFilter($url_string)
    {
        $urlParams = [];

        preg_match_all('/(?<={)[^}]+/', $url_string, $urlParams);

        return $urlParams[0];
    }
}