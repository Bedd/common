<?php
namespace Bedd\Common\Traits;

class TestClassA
{
    use SingletonTrait;
}
class TestClassB
{
    use SingletonTrait;
}
/**
 * SingletonTraitTest
 */
class SingletonTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test for Bedd\Common\Utils\SingletonTrait
     */
    public function testTrait()
    {
        $a1 = TestClassA::getInstance();
        $a2 = TestClassA::getInstance();
        $b1 = TestClassB::getInstance();

        $this->assertEquals($a1, $a2);
        $this->assertNotEquals($a1, $b1);
    }
}
