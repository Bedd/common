<?php
namespace Bedd\Common;

use Bedd\Common\Traits\StaticClassTrait;

/**
 * StringUtils
 */
class StringUtils
{
    use StaticClassTrait;

    /**
     * Split a string on every UpperCase letter
     *
     * @param string $string
     * @throws \InvalidArgumentException
     * @return array
     */
    public static function splitOnUpperCase($string)
    {
        if (!is_string($string)) {
            throw new \InvalidArgumentException('$string should be a string. '.gettype($string).' is given');
        }
        return preg_split('/(?=[A-Z])/', $string, -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Split a string on every LowerCase letter
     *
     * @param string $string
     * @throws \InvalidArgumentException
     * @return array
     */
    public static function splitOnLowerCase($string)
    {
        if (!is_string($string)) {
            throw new \InvalidArgumentException('$string should be a string. '.gettype($string).' is given');
        }
        return preg_split('/(?=[a-z])/', $string, -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * check if $string starts with $query
     *
     * @param string $string
     * @param string $query
     * @return boolean
     */
    public static function startsWith($string, $query)
    {
        return $query === '' || substr($string, 0, strlen($query)) === $query;
    }

    /**
     * check if $string ends with $query
     *
     * @param string $string
     * @param string $query
     * @return boolean
     */
    public static function endsWith($string, $query)
    {
        return $query === '' || substr($string, -strlen($query)) === $query;
    }
    
    /**
     * Converts $string into a bool. Supports english and german words
     *
     * @param string $string
     * @param bool $default
     * @return boolean
     */
    public static function convertToBool($string, $default = false)
    {
        $return = $default;
        $yes = ['true', 't', 'yes', 'y', 'ja', 'j', '1'];
        $no = ['false', 'f', 'no', 'n', 'nein', '0'];
        if (is_scalar($string)) {
            $string = strtolower((string) $string);
            if (in_array($string, $yes)) {
                $return = true;
            } else if(in_array($string, $no)) {
                $return = false;
            }
        }
        return (bool) $return;
    }
}
