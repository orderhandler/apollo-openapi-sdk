<?php
namespace OrderHandler\ApolloOpenApi\Logger;

interface LoggerInterface{

    public function debug($msg);

    public function info($msg);

    public function warning($msg);

    public function error($msg, $exception = null);


}
