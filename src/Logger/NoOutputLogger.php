<?php
namespace OrderHandler\ApolloOpenApi\Logger;

class NoOutputLogger implements LoggerInterface{

    public function debug($msg){
        echo $msg . "\n\n";
    }

    public function info($msg){}

    public function warning($msg){}

    public function error($msg, $exception = null){}


}


