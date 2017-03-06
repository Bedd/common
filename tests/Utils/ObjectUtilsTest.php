<?php
namespace Bedd\Common;

class TestClassA
{
    const MY_CONST = 1;
}

/**
 * ObjectUtilsTest
 */
class ObjectUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test for Bedd\Common\ObjectUtils::getConstants
     */
    public function testGetConstants()
    {
        $this->assertEquals([
            'SECONDS_PER_MINUTE' => 60,
            'SECONDS_PER_HOUR' => 3600,
            'SECONDS_PER_DAY' => 86400,
            'SECONDS_PER_WEEK' => 604800,
            'SECONDS_PER_MONTH' => 2592000,
            'SECONDS_PER_YEAR' => 31536000,
        ], ObjectUtils::getConstants(DateTimeUtils::class));
        $this->assertEquals(['MY_CONST' => 1], ObjectUtils::getConstants(new TestClassA));
    }
}
