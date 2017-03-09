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
     * Return the values from a single column in the input array
     *
     * @param array $input
     * @param string|int $column_key
     * @param string $index_key
     * @return null|array
     */
    public static function column(array $input, $column_key, $index_key = null)
    {
        if (function_exists('array_column')) {
            return array_column($input, $column_key, $index_key);
        }
        $arr = array_map(function($d) use ($column_key, $index_key) {
        if (!isset($d[$column_key])) {
            return null;
        }
        if ($index_key !== null) {
            return [$d[$index_key] => $d[$column_key]];
        }
        return $d[$column_key];
        }, $input);
        if ($index_key !== null) {
            $tmp = [];
            foreach ($arr as $ar) {
                $tmp[key($ar)] = current($ar);
            }
            $arr = $tmp;
        }
        return $arr;
    }

    /**
     * Test whether an array contains one or more string keys
     *
     * @param array $input
     * @param bool $only
     * @param bool $allow_empty Should an empty array() return true
     * @return bool
     */
    public static function hasStringKeys(array $input, $only = false, $allow_empty = false)
    {
        if (!is_array($input)) {
            return false;
        }
        if (!$input) {
            return $allow_empty;
        }
        return count(array_filter(array_keys($input), 'is_string')) > ($only ? count($input) : 0);
    }

    /**
     * Test whether an array contains one or more integer keys
     *
     * @param array $input
     * @param bool $only
     * @param bool $allow_empty    Should an empty array() return true
     * @return bool
     */
    public static function hasIntegerKeys(array $input, $only = false, $allow_empty = false)
    {
        if (!is_array($input)) {
            return false;
        }
        if (!$input) {
            return $allow_empty;
        }
        return count(array_filter(array_keys($input), 'is_int')) > ($only ? count($input) : 0);
    }

    /**
     * Returns the value of the first found key-name
     *
     * @param array $input
     * @param string[] $keys
     * @param string $default
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
        $awr_func = $preserve_keys
        ? function ($v, $k) use (&$return) {$return[$k] = $v;}
        : function ($v) use (&$return) {$return[] = $v;}
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
        if (array_key_exists($old_key, $input)) {
            $keys = array_keys($input);
            $offset = array_search($old_key, $keys);
            $keys[$offset] = $new_key;
            $ret = array_combine($keys, $input);
        }
        return $ret;
    }
}
