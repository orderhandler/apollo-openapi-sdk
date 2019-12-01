<?php

namespace OrderHandler\ApolloOpenApi;


class Configure{

    private $defaultConfig = [

        'PortalAddress' => '',

        'Authorization' => '',

    ];

    private $config = [];

    public function __construct($config){
        $this->config = array_merge( $this->defaultConfig, $config);
    }

    public function setPortalAddress($portalAddress)
    {
        $this->config['PortalAddress'] = $portalAddress;
    }

    public function getPortalAddress()
    {
        return $this->config['PortalAddress'];
    }

    public function setAuthorization($authorization)
    {
        $this->config['Authorization'] = $authorization;
    }

    public function getAuthorization()
    {
        return $this->config['Authorization'];
    }

}

