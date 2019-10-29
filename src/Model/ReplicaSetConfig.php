<?php

namespace Rancher\Model;

use \ArrayAccess;

class ReplicaSetConfig implements ArrayAccess
{
    protected $container = [];

    protected static $typeMap = [
        'minReadySeconds' => 'int',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'minReadySeconds' => 'setMinReadySeconds',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'minReadySeconds' => 'getMinReadySeconds',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['minReadySeconds'] = isset($data['minReadySeconds']) ? $data['minReadySeconds'] : null;
    }

    /**
     * Gets minReadySeconds
     * @return int
     */
    public function getMinReadySeconds()
    {
        return $this->container['minReadySeconds'];
    }

    /**
     * Sets minReadySeconds
     * @param int $minReadySeconds
     * @return $this
     */
    public function setMinReadySeconds($minReadySeconds)
    {
        $this->container['minReadySeconds'] = $minReadySeconds;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
}
