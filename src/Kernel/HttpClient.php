<?php
/**
 * Created by IntelliJ IDEA.
 * User: bella
 * Date: 2019-11-28
 * Time: 14:39
 */

namespace OrderHandler\ApolloOpenApi\Kernel;

use GuzzleHttp\Client;
use RuntimeException;

class HttpClient
{


    public function httpGet(string $url, $data = '')
    {
        return $this->request($url, 'GET', $data);
    }

    public function httpPost(string $url, string $data)
    {
        return $this->request($url, 'POST', $data);
    }

    public function httpPut(string $url, string $data)
    {
        return $this->request($url, 'PUT', $data);
    }


    public function httpDelete(string $url, $data = '')
    {
        return $this->request($url, 'DELETE', $data);
    }


    /**
     * 请求Apollo API，请求成功如返回值按Apollo API返回值为准，否则抛出异常不做任何业务处理
     *
     * @param string $url
     * @param string $method
     * @param string $request_options
     * @return array
     * @throws /RuntimeException
     *
     */
    private function request($url, $method, string $request_options)
    {

        $method = strtoupper($method);
        $config = Register::get('config');

        try {
            $client = new Client;

            $response = $client->request($method, $url, [
                'headers' => [
                    'Content-Type' => 'application/json;charset=utf-8',
                    'Authorization' => $config->getAuthorization()

                ],
                'body' => $request_options

            ]);


            if ($response->getStatusCode() != 200) {
                throw new RuntimeException($response->getStatusCode());
            }
            $rbody = $response->getBody();
            $resJson = (string)$rbody;

            $res =  $resJson ? \GuzzleHttp\json_decode($resJson, 1) : '';

            return $res;

        } catch (RuntimeException $e) {

            throw new RuntimeException($e->getMessage());
        }


    }

}