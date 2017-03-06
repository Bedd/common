<?php
namespace Bedd\Common;

/**
 * ArrayUtilsTest
 */
class ArrayUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test for Bedd\Common\ArrayUtils::column
     */
    public function testColumn()
    {
        $array = [
        ['id'=>1, 'name'=>'Sven'],
        ['id'=>2, 'name'=>'Hans'],
        ['id'=>5, 'name'=>'Peter'],
      ];
        $this->assertEquals(['Sven', 'Hans', 'Peter'], ArrayUtils::column($array, 'name'));
        $this->assertEquals([1, 2, 5], ArrayUtils::column($array, 'id'));
        $this->assertEquals([1=>'Sven', 2=>'Hans', 5=>'Peter'], ArrayUtils::column($array, 'name', 'id'));
        $this->assertEquals(count(ArrayUtils::column($array, 'id')), 3);
    }

    /**
     * Test for Bedd\Common\ArrayUtils::hasStringKeys
     */
    public function testHasStringKeys()
    {
        $array1 = ['a'=>true,2=>true];
        $array2 = ['test', 'test', 'test'];
        $this->assertEquals(true, ArrayUtils::hasStringKeys($array1, false, false));
        $this->assertEquals(false, ArrayUtils::hasStringKeys($array1, true, false));
        $this->assertEquals(false, ArrayUtils::hasStringKeys($array2));
    }

    /**
     * Test for Bedd\Common\ArrayUtils::hasStringKeys
     */
    public function testHasIntegerKeys()
    {
        $array1 = ['a'=>true,2=>true];
        $array2 = ['test', 'test', 'test'];
        $this->assertEquals(true, ArrayUtils::hasIntegerKeys($array1, false));
        $this->assertEquals(false, ArrayUtils::hasIntegerKeys($array1, true));
        $this->assertEquals(true, ArrayUtils::hasIntegerKeys($array2));
    }

    /**
     * Test for Bedd\Common\ArrayUtils::findValueByKeys
     */
    public function testFindValueByKeys()
    {
        $arr1 = ['name' => 'Sven', 'Name' => 'Max'];
        $this->assertEquals(null, ArrayUtils::findValueByKeys($arr1, ['test', 'test2']));
        $this->assertEquals('Max', ArrayUtils::findValueByKeys($arr1, ['test', 'Name']));
        $this->assertEquals('Karl', ArrayUtils::findValueByKeys($arr1, ['test', 'test2'], 'Karl'));
    }

    /**
     * Test for Bedd\Common\ArrayUtils::flatten
     */
    public function testFlatten()
    {
        $arr1 = ['name' => 'Sven', 'Name' => 'Max'];
        $arr2 = ['a', [['b']],['c'],[[[['d']]]]];
        $this->assertEquals($arr1, ArrayUtils::flatten($arr1, true));
        $this->assertEquals(['Sven', 'Max'], ArrayUtils::flatten($arr1, false));
        $this->assertEquals(['a', 'b', 'c', 'd'], ArrayUtils::flatten($arr2));
    }
}
