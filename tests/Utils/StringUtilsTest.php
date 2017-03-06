<?php
namespace Bedd\Common;

/**
 * StringUtilsTest
 */
class StringUtilsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test for Bedd\Common\StringUtils::splitOnUpperCase
     */
    public function testSplitOnUpperCase()
    {
        $this->assertEquals(['hallo welt'], StringUtils::splitOnUpperCase('hallo welt'));
        $this->assertEquals(['hallo ', 'Welt'], StringUtils::splitOnUpperCase('hallo Welt'));
        $this->assertEquals([], StringUtils::splitOnUpperCase(''));
        $this->setExpectedException('InvalidArgumentException');
        StringUtils::splitOnUpperCase(28);
        StringUtils::splitOnUpperCase(['test1', 'test2']);
    }

    /**
     * Test for Bedd\Common\StringUtils::splitOnLowerCase
     */
    public function testSplitOnLowerCase()
    {
        $this->assertEquals(['h', 'a', 'l', 'l', 'o ', 'w', 'e', 'l', 't'], StringUtils::splitOnLowerCase('hallo welt'));
        $this->assertEquals(['HALLO W', 'eLT'], StringUtils::splitOnLowerCase('HALLO WeLT'));
        $this->assertEquals([], StringUtils::splitOnLowerCase(''));
        $this->setExpectedException('InvalidArgumentException');
        StringUtils::splitOnLowerCase(28);
        StringUtils::splitOnLowerCase(['test1', 'test2']);
    }

    /**
     * Test for Bedd\Common\StringUtils::startsWith
     */
    public function testStartsWith()
    {
        $this->assertEquals(false, StringUtils::startsWith('Hallo Welt', 'hallo'));
        $this->assertEquals(true, StringUtils::startsWith('Hallo Welt', 'Hallo'));
        $this->assertEquals(false, StringUtils::startsWith('Hallo Welt', 'Test'));
        $this->assertEquals(true, StringUtils::startsWith('Hallo Welt', ''));
    }

    /**
     * Test for Bedd\Common\StringUtils::endsWith
     */
    public function testEndsWith()
    {
      $this->assertEquals(false, StringUtils::endsWith('Hallo Welt', 'welt'));
      $this->assertEquals(true, StringUtils::endsWith('Hallo Welt', 'Welt'));
      $this->assertEquals(false, StringUtils::endsWith('Hallo Welt', 'Test'));
      $this->assertEquals(true, StringUtils::endsWith('Hallo Welt', ''));
    }
}
