<?php

namespace Rancher\Model;

use \ArrayAccess;

class CronJobStatus implements ArrayAccess
{
    protected $container = [];

    protected static $typeMap = [
        'active' => '\Rancher\Model\ObjectReference[]',
        'lastScheduleTime' => '\DateTime',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'active' => 'setActive',
        'lastScheduleTime' => 'setLastScheduleTime',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'active' => 'getActive',
        'lastScheduleTime' => 'getLastScheduleTime',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['active'] = isset($data['active']) ? $data['active'] : null;
        $this->container['lastScheduleTime'] = isset($data['lastScheduleTime']) ? $data['lastScheduleTime'] : null;
    }

    /**
     * Gets active
     * @return \Rancher\Model\ObjectReference[]
     */
    public function getActive()
    {
        return $this->container['active'];
    }

    /**
     * Sets active
     * @param \Rancher\Model\ObjectReference[] $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->container['active'] = $active;

        return $this;
    }


    /**
     * Gets lastScheduleTime
     * @return \DateTime
     */
    public function getLastScheduleTime()
    {
        return $this->container['lastScheduleTime'];
    }

    /**
     * Sets lastScheduleTime
     * @param \DateTime $lastScheduleTime
     * @return $this
     */
    public function setLastScheduleTime($lastScheduleTime)
    {
        $this->container['lastScheduleTime'] = $lastScheduleTime;

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
