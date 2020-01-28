<?php

declare(strict_types=1);

namespace Nyholm\Tests;

use PHPUnit\Framework\TestCase;

class AppendQueryStringTest extends TestCase
{
    public function provideBaseUrls()
    {
        yield ['https://foo.com', '', 'https://foo.com'];
    }


    public function provideModeIgnore()
    {
        yield from $this->provideBaseUrls();
    }



    public function provideModeReplace()
    {
        yield from $this->provideBaseUrls();
    }



    public function provideModeSkip()
    {
        yield from $this->provideBaseUrls();
    }



    /**
     * @dataProvider provideModeIgnore
     */
    public function testModeIgnore($url, $queryString, $expected)
    {
        $output = append_query_string($url, $queryString, APPEND_QUERY_STRING_IGNORE_DUPLICATE);
        $this->assertEquals($expected, $output);
    }

    /**
     * @dataProvider provideModeReplace
     */
    public function testModeReplace($url, $queryString, $expected)
    {
        $output = append_query_string($url, $queryString, APPEND_QUERY_STRING_REPLACE_DUPLICATE);
        $this->assertEquals($expected, $output);
    }

    /**
     * @dataProvider provideModeSkip
     */
    public function testModeSkip($url, $queryString, $expected)
    {
        $output = append_query_string($url, $queryString, APPEND_QUERY_STRING_SKIP_DUPLICATE);
        $this->assertEquals($expected, $output);
    }
}