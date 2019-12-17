<?php
/**
 * Created by IntelliJ IDEA.
 * User: bella
 * Date: 2019-12-01
 * Time: 14:52
 */

namespace OrderHandler\ApolloOpenApi\Kernel;


use InvalidArgumentException;

class BasicApi
{

    private $init_params = [
        'portal_address' => '',
    ];

    private $httpClient;

    private $config;


    public function __construct()
    {
        $this->httpClient = new HttpClient();
        $this->config = Register::get('config');
    }

    protected function send($method, $url_params, $url, $requestBody = '')
    {

        $url_params = $this->checkParams($url, $url_params);

        $url = Str::urlMerge($url_params, $url);

        switch ($method) {
            case 'GET':
                return $this->httpClient->httpGet($url);
                break;
            case 'POST':
                return $this->httpClient->httpPost($url, $requestBody);
                break;
            case 'PUT':
                return $this->httpClient->httpPut($url, $requestBody);
                break;
            case 'DELETE':
                return $this->httpClient->httpDelete($url);
                break;
            default:
                throw new InvalidArgumentException('Unknown method');
                break;
        }
    }

    private function checkParams($url, array $data = [])
    {

        $this->init_params['portal_address'] = $this->config->getPortalAddress();
        $params = array_merge($this->init_params, $data);

        $required = Str::paramsFilter($url);

        foreach ($required as $item) {
            if (!in_array($item, array_keys($params), true)) {
                throw new InvalidArgumentException(sprintf('Attribute "%s" can not be empty!', $item));
            }
        }

        $params = array_merge(array_flip($required), $params);

        foreach ($params as $key => $param) {
            if (empty($param)) throw new InvalidArgumentException(sprintf('Attribute "%s" can not be empty!', $key));
        }

        return $params;
    }

}