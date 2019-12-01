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

    public static function urlMerge(array $params, $url)
    {
        $urlParams = [];

        preg_match_all('/(\{[\S]*?\})/i', $url, $urlParams);
        $url = str_replace($urlParams[0], '%s', $url);

        array_unshift($params, $url);
        $merge_url = call_user_func_array('sprintf', $params);

        return  $merge_url;
    }
}