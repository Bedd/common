<?php
namespace Bedd\Common;

/**
 * ArrayUtilsTest
 */
class ArrayUtilsTest extends TestCase
{
    public function hasTypeKeysProvider()
    {
        $arr_keys_mixed = ['a'=>3, 1=>'Test', '_foo'=>'bar'];
        $arr_keys_string = ['a'=>'a', 'b'=>'b', 'c'=>'c'];
        $arr_keys_int = ['a', 'b', 'c'];
        return [
            //$input, $only, $allow_empty, $exprected_string, $expected_int
            //only strings
            [$arr_keys_string, false, false, true, false],
            [$arr_keys_string, true, false, true, false],
            [$arr_keys_string, true, true, true, false],
            [$arr_keys_string, false, true, true, false],
            //only ints
            [$arr_keys_int, false, false, false, true],
            [$arr_keys_int, true, false, false, true],
            [$arr_keys_int, true, true, false, true],
            [$arr_keys_int, false, true, false, true],
            //mixed
            [$arr_keys_mixed, false, false, true, true],
            [$arr_keys_mixed, true, false, false, false],
            [$arr_keys_mixed, true, true, false, false],
            [$arr_keys_mixed, false, true, true, true],
            //empty
            [[], false, false, false, false],
            [[], true, false, false, false],
            [[], true, true, true, true],
            [[], false, true, true, true],
        ];
    }
    /**
     * Test for Bedd\Common\ArrayUtils::hasStringKeys
     * @dataProvider hasTypeKeysProvider
     */
    public function testHasStringKeys($input, $only, $allow_empty, $exprected_string)
    {
        $this->assertEquals($exprected_string, ArrayUtils::hasStringKeys($input, $only, $allow_empty));
    }
    /**
     * Test for Bedd\Common\ArrayUtils::hasStringKeys
     * @dataProvider hasTypeKeysProvider
     */
    public function testHasIntegerKeys($input, $only, $allow_empty, $exprected_string, $exprected_int)
    {
        $this->assertEquals($exprected_int, ArrayUtils::hasIntegerKeys($input, $only, $allow_empty));
    }

    public function findValueByKeysProvider()
    {
        $input = ['name'=>'Sven', 2 => 'Alter', 'foo'=>'bar', 'FOO'=>'BAR'];
        return [
            //$input, $keys, $default, $expected
            [$input, [], null, null],
            [$input, [], false, false],
            [$input, [], 'Wurst', 'Wurst'],
            [$input, ['name'], null, 'Sven'],
            [$input, ['name', 'foo'], null, 'Sven'],
            [$input, ['Name', 'foo'], null, 'bar'],
            [$input, ['Name', 'foo'], 'Hans', 'bar'],
            [$input, ['foo', 'name'], null, 'bar'],
            [$input, ['Foo', 2], null, 'Alter'],
            [$input, ['foo', 2], null, 'bar'],
            [$input, ['Foo', 'FOO'], null, 'BAR'],
        ];
    }
    /**
     * Test for Bedd\Common\ArrayUtils::findValueByKeys
     * @dataProvider findValueByKeysProvider
     */
    public function testFindValueByKeys(array $input, array $keys, $default, $exprected)
    {
        $this->assertEquals($exprected, ArrayUtils::findValueByKeys($input, $keys, $default));
    }

    public function flattenProvider()
    {
        return [
            //$input, $preserve_keys, $expected
            [[], true, []],
            [[], false, []],
            [['name' => 'Sven', 'Name' => 'Hans', 'Wurst'], false, ['Sven', 'Hans', 'Wurst']],
            [['name' => 'Sven', 'Name' => 'Hans', 'Wurst'], true, ['name' => 'Sven', 'Name' => 'Hans', 'Wurst']],
            [['a', [['b']],['c'],[[[['d']]]]], false, ['a', 'b', 'c', 'd']],
            [['a', [['b']],['c'],[[[['d']]]], 'd'], false, ['a', 'b', 'c', 'd', 'd']],
        ];
    }
    /**
     * Test for Bedd\Common\ArrayUtils::flatten
     * @dataProvider flattenProvider
     */
    public function testFlatten($input, $preserve_keys, $expected)
    {
        $this->assertEquals($expected, ArrayUtils::flatten($input, $preserve_keys));
    }
    
    public function renameKeyProvider()
    {
        return [
            //$input, $old_key, $new_key, $expected
            [['name'=>'Sven'], 'test', 'test', ['name'=>'Sven']],
            [['name'=>'Sven'], 'test', 'test2', ['name'=>'Sven']],
            [['name'=>'Sven'], 'name', 'Name', ['Name'=>'Sven']],
            [['name'=>'Sven', 'alter' => 20], 'alter', 'age', ['name'=>'Sven', 'age' => 20]],
            [['name'=>'Sven', 'alter' => 20, 'test'=>'Test'], 'alter', 'age', ['name'=>'Sven', 'age' => 20, 'test'=>'Test']],
        ];
    }
    /**
     * Test for Bedd\Common\ArrayUtils::renameKey
     * @dataProvider renameKeyProvider
     */
    public function testRenameKey($input, $old_key, $new_key, $expected)
    {
        $this->assertEquals($expected, ArrayUtils::renameKey($input, $old_key, $new_key));
    }
}
