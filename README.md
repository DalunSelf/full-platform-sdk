# Full Platform API SDK for PHP

<!-- [![Build Status](https://github.com/line/full-platform-sdk-php/actions/workflows/php-checks.yml/badge.svg?branch=master)](https://github.com/line/full-platform-sdk-php/actions) -->


## 介紹

PHP 的 Full Platform API SDK 使用開發後端變得更容易，您可以在幾分鐘內創建一個後端。


## 文檔

有關詳細信息，請參閱官方 API 文檔

- 台灣: 待開發


## 要求

- PHP 5.6 or later


## 安裝

使用 [Composer](https://getcomposer.org/) 安裝 Full Platform API SDK

```
$ composer require ryan/full-platform-sdk
```

## 入門

### 創建平台客戶端實例

平台客戶端實例是 Full Platform API 的處理程序

```php
$httpClient = new \Ryan\FullPlatform\HTTPClient\CurlHTTPClient('<organization api key>');
$full = new \Ryan\FullPlatform($httpClient, ['channelSecret' => '<organization api key>']);
```

平台客戶端的構造函數需要一個 `HTTPClient` 的實例 `HTTPClient`.

這個庫默認提供 `CurlHTTPClient`

### 調用接口Call API

您可以通過平台客戶端實例調用 API.

一個非常簡單的例子:

```php
$response = $full->getWebsite();
```

此過程將消息發送到關聯的目的地

一個更高級的例子:

```php
$response = $full->getWebsite();
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}

// 失敗的
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
```

## 組件

### Response

Methods that call API returns `Response`. A `Response` instance has following methods:

- `Response#isSucceeded()`
- `Response#getHTTPStatus()`
- `Response#getRawBody()`
- `Response#getJSONDecodedBody()`
- `Response#getHeader($name)`
- `Response#getHeaders()`

You can use these methods to check the response status and take response body.

#### `Response#isSucceeded()`

Returns a Boolean value. The return value represents whether the request succeeded or not.

#### `Response#getHTTPStatus()`

Returns the HTTP status code of a response.

#### `Response#getRawBody()`

Returns the body of the response as raw data (a byte string).

#### `Response#getJSONDecodedBody()`

Returns the body that is decoded in JSON. This body is an array.

#### `Response#getHeader($name)`

This method returns a response header string, or null if the response does not have a header of that name.

#### `Response#getHeaders()`

This method returns all of the response headers as string array.

<!-- ### Laravel Support
Easy to use from Laravel.
After installed, add `FULL-PLATFORM_CHANNEL_ACCESS_TOKEN` and `FULL-PLATFORM_CHANNEL_SECRET` to `.env`

```
FULL-PLATFORM_CHANNEL_ACCESS_TOKEN=<Channel Access Token>
FULL-PLATFORM_CHANNEL_SECRET=<Channel Secret>
```

then you can use `FullPlatform` facade like following.

```
$profile = \FullPlatform::getProfile($userId);
``` -->
