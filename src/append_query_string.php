<?php

declare(strict_types=1);

/**
 * No checks for duplicate are made
 */
define('APPEND_QUERY_STRING_IGNORE_DUPLICATE', 0);

/**
 * An existing query string key is removed and replaced by a new value.
 */
define('APPEND_QUERY_STRING_REPLACE_DUPLICATE', 1);

/**
 * An new query string key is not added if there is an existing key.
 */
define('APPEND_QUERY_STRING_SKIP_DUPLICATE', 2);

/**
 * Add a query string to an existing URL. Existing query strings will not
 * be replaced, merged or overwritten.
 *
 * @param string $url The base URL. Example "https://nyholm.tech?biz=1"
 * @param string $queryString A string like "foo=bar&baz=2"
 * @return string The resulting string.
 */
function append_query_string(string $url, string $queryString, int $mode = APPEND_QUERY_STRING_IGNORE_DUPLICATE): string
{

    return $url;
}

