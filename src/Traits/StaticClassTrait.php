<?php
namespace Bedd\Common\Traits;

/**
 * StaticClassTrait
 */
trait StaticClassTrait
{
    /**
     * Constructor
     *
     * @throws \LogicException
     */
    final public function __construct()
    {
        throw new \LogicException('Class '.get_class($this).' is static and can not be instantiated');
    }
}
