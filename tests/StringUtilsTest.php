<?php
namespace Bedd\Common;

/**
 * StringUtilsTest
 */
class StringUtilsTest extends TestCase
{
    public function splitOnUpperCaseProvider()
    {
        return [
            ['hallo welt', ['hallo welt']],
            ['Hallo Welt', ['Hallo ', 'Welt']],
            ['WurstFingerTest', ['Wurst', 'Finger', 'Test']],
            ['Wurst_Finger_Test', ['Wurst_', 'Finger_', 'Test']],
            ['TOLLESACHE', ['T', 'O', 'L', 'L', 'E', 'S', 'A', 'C', 'H', 'E']],
        ];
    }
    /**
     * Test for Bedd\Common\StringUtils::splitOnUpperCase
     * @dataProvider splitOnUpperCaseProvider
     */
    public function testSplitOnUpperCase($input, $expected)
    {
        $this->assertEquals($expected, StringUtils::splitOnUpperCase($input));
    }

    public function splitOnLowerCaseProvider()
    {
        return [
            ['HALLO WELT', ['HALLO WELT']],
            ['hALLO wELT', ['hALLO ', 'wELT']],
            ['wURSTfINGERtEST', ['wURST', 'fINGER', 'tEST']],
            ['tollesache', ['t', 'o', 'l', 'l', 'e', 's', 'a', 'c', 'h', 'e']],
        ];
    }
    /**
     * Test for Bedd\Common\StringUtils::splitOnLowerCase
     * @dataProvider splitOnLowerCaseProvider
     */
    public function testSplitOnLowerrCase($input, $expected)
    {
        $this->assertEquals($expected, StringUtils::splitOnLowerCase($input));
    }

    public function startsWithProvider()
    {
        return [
            //positive
            ['', '', true],
            ['Hallo Welt', 'Hal', true],
            ['Hallo Welt', '', true],
            [' Hallo Welt', ' ', true],
            [123, '1', true],
            //negative
            ['', 'Welt', false],
            ['Hallo Welt', 'hallo', false],
            ['Hallo Welt', ' ', false],
        ];
    }
    /**
     * Test for Bedd\Common\StringUtils::startsWith
     * @dataProvider startsWithProvider
     */
    public function testStartsWith($string, $query, $expected)
    {
        $this->assertEquals($expected, StringUtils::startsWith($string, $query));
    }

    public function endsWithProvider()
    {
        return [
            //positive
            ['', '', true],
            ['Hallo Welt', 'Welt', true],
            ['Hallo Welt', '', true],
            ['Hallo Welt ', ' ', true],
            [123, '3', true],
            //negative
            ['', 'Welt', false],
            ['Hallo Welt', 'welt', false],
            ['Hallo Welt', ' ', false],
        ];
    }
    /**
     * Test for Bedd\Common\StringUtils::startsWith
     * @dataProvider endsWithProvider
     */
    public function testEndsWith($string, $query, $expected)
    {
        $this->assertEquals($expected, StringUtils::endsWith($string, $query));
    }
}
