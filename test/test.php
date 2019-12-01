<?php
require_once("../vendor/autoload.php");

$config = [
    'PortalAddress' => 'Your Portal Address',
    'Authorization' => 'Your Authorization',
];


/**
 * Base
 */
//$base = OrderHandler\ApolloOpenApi\ApiFactory::base($config);
//$appList = $base->getApp($appId);
//
//print_r($appList);



/**
 * Namespaces
 */
//$data = [
//    'env' => 'DEV',
//    'appId' => 'wgcrm',
//    'clusterName' => 'default',
//    'namespaceName' => 'system',
//];
//$namespace = OrderHandler\ApolloOpenApi\ApiFactory::namespaces($config);
//
//$namespaceOne = $namespace->getOne($data);
//print_r($namespaceOne);

/**
 * Configuration
 */
$data = [
    'env' => 'DEV',
    'appId' => '',
    'clusterName' => '',
    'namespaceName' => '',
];

$request = [
//    'key' => '',
//    'value' => '',
//    'comment' => '',
//    'dataChangeCreatedBy' => '',
    //'dataChangeLastModifiedBy' => '',
    'releaseTitle' => '',
    'releaseComment' => '',
    'releasedBy' => '',


];



$configuration = OrderHandler\ApolloOpenApi\ApiFactory::configuration($config);
$release = $configuration->release($data,json_encode($request));

