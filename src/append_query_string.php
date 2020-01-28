<?php

declare(strict_types=1);

/*
 * No checks for duplicate are made
 */
define('APPEND_QUERY_STRING_IGNORE_DUPLICATE', 0);

/*
 * An existing query string key is removed and replaced by a new value.
 */
define('APPEND_QUERY_STRING_REPLACE_DUPLICATE', 1);

/*
 * An new query string key is not added if there is an existing key.
 */
define('APPEND_QUERY_STRING_SKIP_DUPLICATE', 2);

/**
 * Add a query string to an existing URL.
 *
 * @param string $url         The base URL. Example "https://nyholm.tech?biz=1"
 * @param string $queryString A string like "foo=bar&baz=2"
 * @param int    $mode        How to handle duplicate keys. See predefined constants above.
 *
 * @return string the resulting string
 */
function append_query_string(string $url, string $queryString, int $mode = APPEND_QUERY_STRING_IGNORE_DUPLICATE): string
{
    if ('' === $queryString) {
        return $url;
    }

    $existing = parse_url($url, PHP_URL_QUERY);
    $fragment = parse_url($url, PHP_URL_FRAGMENT);
    $fragment = $fragment ? '#'.$fragment : '';

    // Remove fragment
    if (false !== strrpos($url, '#')) {
        $url = substr($url, 0, strrpos($url, '#'));
    }

    // If no existing query string
    if (empty($existing)) {
        // Check for "?" at the last character in $url
        $questionMark = '?';
        if ('?' === $url[strlen($url) - 1]) {
            $questionMark = '';
        }

        return $url.$questionMark.$queryString.$fragment;
    }

    // Remove query string from URL
    $result = substr($url, 0, strrpos($url, $existing));

    if (APPEND_QUERY_STRING_IGNORE_DUPLICATE === $mode) {
        $result .= $existing.'&'.$queryString;
    } else {
        parse_str($existing, $existingArray);
        parse_str($queryString, $newArray);
        if (APPEND_QUERY_STRING_REPLACE_DUPLICATE === $mode) {
            $queryString = http_build_query(array_merge($existingArray, $newArray));
        } elseif (APPEND_QUERY_STRING_SKIP_DUPLICATE === $mode) {
            $queryString = http_build_query(array_merge($newArray, $existingArray));
        }
        $result .= $queryString;
    }

    // add fragment
    return $result.$fragment;
}
