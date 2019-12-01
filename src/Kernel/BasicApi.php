<?php
/**
 * Created by IntelliJ IDEA.
 * User: bella
 * Date: 2019-12-01
 * Time: 14:52
 */

namespace OrderHandler\ApolloOpenApi\Kernel;


use InvalidArgumentException;

class BasicApi extends HttpClient
{

    protected $message = [
        'portal_address' => '',
        'env' => '',
        'appId' => '',
        'clusterName' => '',
    ];

    /**
     * Required attributes.
     *
     * @var array
     */
    protected $required = ['portal_address', 'env', 'appId', 'clusterName'];


    public function send($method, $url_params, $url, $requestBody = '')
    {

        $url_params = $this->checkParams($url_params);
        $url = $this->setUrl($url_params, $url);

        switch ($method) {
            case 'GET':
                return $this->httpGet($url);
                break;
            case 'POST':
                return $this->httpPost($url, $requestBody);
                break;
            case 'PUT':
                return $this->httpPut($url, $requestBody);
                break;
            case 'DELETE':
                return $this->httpDelete($url);
                break;
            default:
                throw new InvalidArgumentException('Unknown method');
                break;
        }
    }

    private function setUrl($url_params, $url)
    {
        return Str::urlMerge($url_params, $url);
    }

    private function checkParams(array $data = [])
    {
        //todo 必传参数验证（其实目前这个验证暂时没啥用，先凑合用吧
        $this->message['portal_address'] = $this->config->getPortalAddress();
        $params = array_merge($this->message, $data);

        array_map(function ($key, $value) {
            if (in_array($key, $this->required, true) && empty($value) && empty($this->message[$key])) {
                throw new InvalidArgumentException(sprintf('Attribute "%s" can not be empty!', $key));
            }
        }, array_keys($params), $params);

        return $params;
    }

}