<?php

namespace Rancher\Model;

use \ArrayAccess;

class ComposeStatus implements ArrayAccess
{
    protected $container = [];

    protected static $typeMap = [
        'conditions' => '\Rancher\Model\ComposeCondition[]',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'conditions' => 'setConditions',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'conditions' => 'getConditions',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['conditions'] = isset($data['conditions']) ? $data['conditions'] : null;
    }

    /**
     * Gets conditions
     * @return \Rancher\Model\ComposeCondition[]
     */
    public function getConditions()
    {
        return $this->container['conditions'];
    }

    /**
     * Sets conditions
     * @param \Rancher\Model\ComposeCondition[] $conditions
     * @return $this
     */
    public function setConditions($conditions)
    {
        $this->container['conditions'] = $conditions;

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
