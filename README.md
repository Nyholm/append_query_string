# PHP function to append query string to URL. 

If you have a unknown URL and want to add a query string to it, 
this package is what you are looking for. 

## Install

```cli
composer require nyholm/append-query-string
```

## Usage

```php
$url = 'https://nyholm.tech?example=yes';
$queryString = http_build_query(['foo'=>'bar']);

$result = append_query_string($url, $queryString);

echo $result;
// https://nyholm.tech?example=yes&foo=bar

```

Yes, this is pretty much as writing: 

```php
$result = $url . $queryString;
```

But it will support if URL has query string or not. It will also if a URL hash
fragment is used. 

## Modes

There are three different modes you can use with `append_query_string`. 

- `APPEND_QUERY_STRING_IGNORE_DUPLICATE`
- `APPEND_QUERY_STRING_REPLACE_DUPLICATE`
- `APPEND_QUERY_STRING_SKIP_DUPLICATE`

They are easiest explained with examples. 

#### APPEND_QUERY_STRING_IGNORE_DUPLICATE
```php
$url = 'https://nyholm.tech?foo=x&a=1';
$queryString = http_build_query(['a'=>'2']);

$result = append_query_string($url, $queryString, APPEND_QUERY_STRING_IGNORE_DUPLICATE);

echo $result;
// https://nyholm.tech?foo=x&a=1&a=2
```

#### APPEND_QUERY_STRING_REPLACE_DUPLICATE

```php
$url = 'https://nyholm.tech?foo=x&a=1';
$queryString = http_build_query(['a'=>'2']);

$result = append_query_string($url, $queryString, APPEND_QUERY_STRING_REPLACE_DUPLICATE);

echo $result;
// https://nyholm.tech?foo=x&a=2
```

#### APPEND_QUERY_STRING_SKIP_DUPLICATE

```php
$url = 'https://nyholm.tech?foo=x&a=1';
$queryString = http_build_query(['a'=>'2']);

$result = append_query_string($url, $queryString, APPEND_QUERY_STRING_SKIP_DUPLICATE);

echo $result;
// https://nyholm.tech?foo=x&a=1
```