<?php

namespace Rancher\Model;

use \ArrayAccess;

class MetricRule implements ArrayAccess
{
    protected $container = [];

    protected static $typeMap = [
        'comparison' => 'string',
        'description' => 'string',
        'duration' => 'string',
        'expression' => 'string',
        'thresholdValue' => 'float',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'comparison' => 'setComparison',
        'description' => 'setDescription',
        'duration' => 'setDuration',
        'expression' => 'setExpression',
        'thresholdValue' => 'setThresholdValue',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'comparison' => 'getComparison',
        'description' => 'getDescription',
        'duration' => 'getDuration',
        'expression' => 'getExpression',
        'thresholdValue' => 'getThresholdValue',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['comparison'] = isset($data['comparison']) ? $data['comparison'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['duration'] = isset($data['duration']) ? $data['duration'] : null;
        $this->container['expression'] = isset($data['expression']) ? $data['expression'] : null;
        $this->container['thresholdValue'] = isset($data['thresholdValue']) ? $data['thresholdValue'] : null;
    }

    /**
     * Gets comparison
     * @return string
     */
    public function getComparison()
    {
        return $this->container['comparison'];
    }

    /**
     * Sets comparison
     * @param string $comparison
     * @return $this
     */
    public function setComparison($comparison)
    {
        $this->container['comparison'] = $comparison;

        return $this;
    }


    /**
     * Gets description
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }


    /**
     * Gets duration
     * @return string
     */
    public function getDuration()
    {
        return $this->container['duration'];
    }

    /**
     * Sets duration
     * @param string $duration
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->container['duration'] = $duration;

        return $this;
    }


    /**
     * Gets expression
     * @return string
     */
    public function getExpression()
    {
        return $this->container['expression'];
    }

    /**
     * Sets expression
     * @param string $expression
     * @return $this
     */
    public function setExpression($expression)
    {
        $this->container['expression'] = $expression;

        return $this;
    }


    /**
     * Gets thresholdValue
     * @return float
     */
    public function getThresholdValue()
    {
        return $this->container['thresholdValue'];
    }

    /**
     * Sets thresholdValue
     * @param float $thresholdValue
     * @return $this
     */
    public function setThresholdValue($thresholdValue)
    {
        $this->container['thresholdValue'] = $thresholdValue;

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
