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