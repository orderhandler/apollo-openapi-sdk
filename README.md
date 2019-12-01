# apollo-openapi-sdk
A SDK For Apollo Open Api

## Requirement

1. PHP >= 7.2
2. **[Composer](https://getcomposer.org/)**

## Installation

```shell
$ composer require "orderhandler/apollo-openapi-sdk"
```
## Usage

使用（以Base为例）：
```php
<?php

use OrderHandler\ApolloOpenApi\ApiFactory;

$config = [
    'PortalAddress' => 'Your Portal Address',
    'Authorization' => 'Your Authorization',
];

$base = ApiFactory::base($config);
$appList = $base->getApp($appId);

```
##Documentation


####获取App的环境，集群信息
###### 属性列表：
> + appId  所管理的配置App Id
```
$base = ApiFactory::base($config);
$appList = $base->getApp($appId);
```

###### 返回数据示例
```
[
      {
          "env":"DEV",
          "clusters":[ //集群列表
              "default",
              "FAT381"
          ]
      },
      {
          "env":"UAT",
          "clusters":[
              "default"
          ]
      },
      {
          "env":"PRO",
          "clusters":[
              "default",
              "SHAOY",
              "SHAJQ"
          ]
      }
  ]
```