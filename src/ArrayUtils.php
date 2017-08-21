<?php
namespace Bedd\Common;

use Bedd\Common\Traits\StaticClassTrait;

/**
 * ArrayUtils
 */
class ArrayUtils
{
    use StaticClassTrait;

    /**
     * Test whether an array contains one or more keys by defined $type
     *
     * @param string $type the Type: string|int
     * @param array $input
     * @param bool $only
     * @param bool $allow_empty Should an empty $input return true
     * @return bool
     */
    private static function hasKeysByType($type, array $input, $only = false, $allow_empty = false)
    {
        if (!is_array($input)) {
            return false;
        }
        if (empty($input)) {
            return $allow_empty;
        }
        $count = count(array_filter(array_keys($input), 'is_'.strtolower($type)));
        return  $only ? $count === count($input) : $count > 0;
    }
    /**
     * Test whether an array contains one or more string keys
     *
     * @param array $input
     * @param bool $only
     * @param bool $allow_empty Should an empty $input return true
     * @return bool
     */
    public static function hasStringKeys(array $input, $only = false, $allow_empty = false)
    {
        return self::hasKeysByType('string', $input, $only, $allow_empty);
    }

    /**
     * Test whether an array contains one or more integer keys
     *
     * @param array $input
     * @param bool $only
     * @param bool $allow_empty Should an empty $input return true
     * @return bool
     */
    public static function hasIntegerKeys(array $input, $only = false, $allow_empty = false)
    {
        return self::hasKeysByType('int', $input, $only, $allow_empty);
    }

    /**
     * Returns the value of the first found key-name
     *
     * @param array $input
     * @param string[] $keys
     * @param mixed $default
     * @return mixed
     */
    public static function findValueByKeys(array $input, array $keys, $default = null)
    {
        $return = $default;
        foreach ($keys as $key) {
            if (isset($input[$key])) {
                $return = $input[$key];
                break;
            }
        }
        return $return;
    }

    /**
     * Flatten a multi-dimensional aray into a one dimensional array
     *
     * @param array $input
     * @param string $preserve_keys
     * @return array
     */
    public static function flatten(array $input, $preserve_keys = false)
    {
        $return = [];
        $awr_func = $preserve_keys ?
            function($v, $k) use (&$return) {$return[$k] = $v; } :
            function($v) use (&$return) {$return[] = $v; }
        ;
        array_walk_recursive($input, $awr_func);
        return $return;
    }

    /**
     * Rename a key inside a dimensional array
     *
     * @param array $input
     * @param string old_key
     * @param string new_key
     * @return array
     */
    public static function renameKey(array $input, $old_key, $new_key)
    {
        $ret = $input;
        if ($old_key !== $new_key && array_key_exists($old_key, $input)) {
            $keys = array_keys($input);
            $offset = array_search($old_key, $keys);
            $keys[$offset] = $new_key;
            $ret = array_combine($keys, $input);
        }
        return $ret;
    }
}
