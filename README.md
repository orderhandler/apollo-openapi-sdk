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
    'Authorization' => 'Your Authorization Token',
];

$base = ApiFactory::base($config);
$appList = $base->getApp($appId);

```
## Documentation

##### Config参数说明：
|参数名|参数说明|
|---|---|
|PortalAddress|Apollo地址|
|Authorization|申请的token|

##### URL路径参数说明：
|参数名|参数说明|
|---|---|
|env|所管理的配置环境|
|appId|所管理的配置AppId|
|clusterName|所管理的配置集群名|
|namespaceName|所管理的Namespace的名称|
|key|需要配置的key，在修改、删除配置中使用|
|operator|操作者，域账号，在删除配置中使用|

### 1.Base

#### 实例化
```php
<?php
//config参数详情见顶部参数说明
$base = OrderHandler\ApolloOpenApi\ApiFactory::base($config);
```
#### 1.1获取App的环境，集群信息

###### 参数说明：
> + appId  所管理的配置App Id
```
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

### 2.Namespace

#### 实例化
```php
<?php
//config参数详情见顶部参数说明
$namespaces = OrderHandler\ApolloOpenApi\ApiFactory::namespaces($config);
```
#### 2.1获取集群下所有Namespace信息

###### 参数说明：
> + url_params  参数详情见顶部URL路径参数说明
```
$url_params = [
        'env' => 'ENV',
        'appId' => 'APPID',
        'clusterName' => 'CLUSTERNAME',];
$list = $namespaces->getAll($url_params);
```

###### 返回数据示例
```
[
  {
    "appId": "100003171",
    "clusterName": "default",
    "namespaceName": "application",
    "comment": "default app namespace",
    "format": "properties", //Namespace格式可能取值为：properties、xml、json、yml、yaml
    "isPublic": false, //是否为公共的Namespace
    "items": [ // Namespace下所有的配置集合
      {
        "key": "batch",
        "value": "100",
        "dataChangeCreatedBy": "song_s",
        "dataChangeLastModifiedBy": "song_s",
        "dataChangeCreatedTime": "2016-07-21T16:03:43.000+0800",
        "dataChangeLastModifiedTime": "2016-07-21T16:03:43.000+0800"
      }
    ],
    "dataChangeCreatedBy": "song_s",
    "dataChangeLastModifiedBy": "song_s",
    "dataChangeCreatedTime": "2016-07-20T14:05:58.000+0800",
    "dataChangeLastModifiedTime": "2016-07-20T14:05:58.000+0800"
  },
  {
    "appId": "100003171",
    "clusterName": "default",
    "namespaceName": "FX.apollo",
    "comment": "apollo public namespace",
    "format": "properties",
    "isPublic": true,
    "items": [
      {
        "key": "request.timeout",
        "value": "3000",
        "comment": "",
        "dataChangeCreatedBy": "song_s",
        "dataChangeLastModifiedBy": "song_s",
        "dataChangeCreatedTime": "2016-07-20T14:08:30.000+0800",
        "dataChangeLastModifiedTime": "2016-08-01T13:56:25.000+0800"
      },
      {
        "id": 1116,
        "key": "batch",
        "value": "3000",
        "comment": "",
        "dataChangeCreatedBy": "song_s",
        "dataChangeLastModifiedBy": "song_s",
        "dataChangeCreatedTime": "2016-07-28T15:13:42.000+0800",
        "dataChangeLastModifiedTime": "2016-08-01T13:51:00.000+0800"
      }
    ],
    "dataChangeCreatedBy": "song_s",
    "dataChangeLastModifiedBy": "song_s",
    "dataChangeCreatedTime": "2016-07-20T14:08:13.000+0800",
    "dataChangeLastModifiedTime": "2016-07-20T14:08:13.000+0800"
  }
]
```

#### 2.2获取某个Namespace信息

###### 参数说明：
> + url_params  参数详情见顶部URL路径参数说明
```
$url_params = [
        'env' => 'ENV',
        'appId' => 'APPID',
        'clusterName' => 'CLUSTERNAME',
        'namespaceName' => 'NAMESPACENAME',];
$result = $namespaces->getOne($url_params);
```

###### 返回数据示例
```
{
    "appId": "100003171",
    "clusterName": "default",
    "namespaceName": "application",
    "comment": "default app namespace",
    "format": "properties", //Namespace格式可能取值为：properties、xml、json、yml、yaml
    "isPublic": false, //是否为公共的Namespace
    "items": [ // Namespace下所有的配置集合
      {
        "key": "batch",
        "value": "100",
        "dataChangeCreatedBy": "song_s",
        "dataChangeLastModifiedBy": "song_s",
        "dataChangeCreatedTime": "2016-07-21T16:03:43.000+0800",
        "dataChangeLastModifiedTime": "2016-07-21T16:03:43.000+0800"
      }
    ],
    "dataChangeCreatedBy": "song_s",
    "dataChangeLastModifiedBy": "song_s",
    "dataChangeCreatedTime": "2016-07-20T14:05:58.000+0800",
    "dataChangeLastModifiedTime": "2016-07-20T14:05:58.000+0800"
  }
```

#### 2.3创建Namespace

###### 参数说明：
> + appId  所管理的配置AppId
> + requestBody  请求内容，json格式传参，详情如下：
###### 请求内容列表(Request Body，JSON格式)：
|参数名|必选|类型|说明|
|---|---|---|---|
|name|true|String|Namespace的名字|
|appId|true|String|Namespace所属的AppId|
|format|true|String|Namespace的格式|
|isPublic|true|boolean|是否是公共文件|
|comment|false|String|Namespace说明|
|dataChangeCreatedBy|true|String|namespace的创建人|

```
$result = $namespaces->create($appId, $requestBody);
```

###### 返回数据示例
```
{
  "name": "FX.public-0420-11",
  "appId": "100003173",
  "format": "properties",
  "isPublic": true,
  "comment": "test",
  "dataChangeCreatedBy": "zhanglea",
  "dataChangeLastModifiedBy": "zhanglea",
  "dataChangeCreatedTime": "2017-04-20T18:25:49.033+0800",
  "dataChangeLastModifiedTime": "2017-04-20T18:25:49.033+0800"
}
```

#### 2.4获取某个Namespace当前编辑人

###### 参数说明：
> + url_params  参数详情见顶部URL路径参数说明
```
$url_params = [
        'env' => 'ENV',
        'appId' => 'APPID',
        'clusterName' => 'CLUSTERNAME',
        'namespaceName' => 'NAMESPACENAME',];
$result = $namespaces->getStatus($url_params);
```

###### 返回数据示例
> + 未锁定 ：
```
{
  "namespaceName": "application",
  "isLocked": false
}
```
> + 被锁定 ：
```
{
  "namespaceName": "application",
  "isLocked": true,
  "lockedBy": "song_s" //锁owner
}
```

### 3.Configuration

#### 实例化
```php
<?php
//config参数详情见顶部参数说明
$configuration = OrderHandler\ApolloOpenApi\ApiFactory::configuration($config);
```
#### 3.1新增配置

###### 属性列表：
> + url_params  参数详情见顶部参数说明
> + requestBody  请求内容，json格式传参，详情如下：

###### 请求内容列表(Request Body，JSON格式)：
|参数名|必选|类型|说明|
|---|---|---|---|
|key|true|String|配置的key，长度不能超过128个字符。非properties格式，key固定为content|
|value|true|String|配置的value，长度不能超过20000个字符，非properties格式，value为文件全部内容|
|comment|false|String|配置的备注,长度不能超过1024个字符|
|dataChangeCreatedBy|true|String|item的创建人，格式为域账号，也就是sso系统的User ID|
```
$url_params = [
        'env' => 'ENV',
        'appId' => 'APPID',
        'clusterName' => 'CLUSTERNAME',
        'namespaceName' => 'NAMESPACENAME',];
$result = $configuration->add($url_params, $requestBody);
```

###### 返回数据示例
```
{
    "key": "timeout",
    "value": "3000",
    "comment": "超时时间",
    "dataChangeCreatedBy": "zhanglea",
    "dataChangeLastModifiedBy": "zhanglea",
    "dataChangeCreatedTime": "2016-08-11T12:06:41.818+0800",
    "dataChangeLastModifiedTime": "2016-08-11T12:06:41.818+0800"
}
```

#### 3.2修改配置

###### 属性列表：
> + url_params  参数详情见顶部参数说明
> + requestBody  请求内容，json格式传参，详情如下：

###### 请求内容列表(Request Body，JSON格式)：
|参数名|必选|类型|说明|
|---|---|---|---|
|key|true|String|配置的key，需和url中的key值一致。非properties格式，key固定为content|
|value|true|String|配置的value，长度不能超过20000个字符，非properties格式，value为文件全部内容|
|comment|false|String|配置的备注,长度不能超过1024个字符|
|dataChangeLastModifiedBy|true|String|item的修改人，格式为域账号，也就是sso系统的User ID|
```
$url_params = [
        'env' => 'ENV',
        'appId' => 'APPID',
        'clusterName' => 'CLUSTERNAME',
        'namespaceName' => 'NAMESPACENAME',
        'key' => 'KEY',];
$result = $configuration->update($url_params, $requestBody);
```

###### 返回数据示例
> 无

#### 3.3发布配置

###### 属性列表：
> + url_params  参数详情见顶部参数说明
> + requestBody  请求内容，json格式传参，详情如下：

###### 请求内容列表(Request Body，JSON格式)：
|参数名|必选|类型|说明|
|---|---|---|---|
|releaseTitle|true|String|此次发布的标题，长度不能超过64个字符|
|releaseComment|false|String|发布的备注，长度不能超过256个字符|
|releasedBy|true|String|发布人，域账号|

```
$url_params = [
        'env' => 'ENV',
        'appId' => 'APPID',
        'clusterName' => 'CLUSTERNAME',
        'namespaceName' => 'NAMESPACENAME',];
$result = $configuration->release($url_params,$requsetBody);
```

###### 返回数据示例
```
{
    "appId": "test-0620-01",
    "clusterName": "test",
    "namespaceName": "application",
    "name": "2016-08-11",
    "configurations": {
        "timeout": "3000",
    },
    "comment": "修改timeout值",
    "dataChangeCreatedBy": "zhanglea",
    "dataChangeLastModifiedBy": "zhanglea",
    "dataChangeCreatedTime": "2016-08-11T14:03:46.232+0800",
    "dataChangeLastModifiedTime": "2016-08-11T14:03:46.235+0800"
}
```

#### 3.4删除配置

###### 属性列表：
> + url_params  参数详情见顶部参数说明

```
$url_params = [
        'env' => 'ENV',
        'appId' => 'APPID',
        'clusterName' => 'CLUSTERNAME',
        'namespaceName' => 'NAMESPACENAME',
        'key' => 'KEY',
        'operator' => 'OPERATOR',];
$result = $configuration->delete($url_params);
```

###### 返回数据示例
> 无