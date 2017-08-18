<?php
namespace Bedd\Common\Traits;

use Bedd\Common\TestCase;

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
class SingletonTraitTest extends TestCase
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
