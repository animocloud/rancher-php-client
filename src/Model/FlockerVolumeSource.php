<?php

namespace Rancher\Model;

use \ArrayAccess;

class FlockerVolumeSource implements ArrayAccess
{
    protected $container = [];

    protected static $typeMap = [
        'datasetName' => 'string',
        'datasetUUID' => 'string',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'datasetName' => 'setDatasetName',
        'datasetUUID' => 'setDatasetUUID',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'datasetName' => 'getDatasetName',
        'datasetUUID' => 'getDatasetUUID',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['datasetName'] = isset($data['datasetName']) ? $data['datasetName'] : null;
        $this->container['datasetUUID'] = isset($data['datasetUUID']) ? $data['datasetUUID'] : null;
    }

    /**
     * Gets datasetName
     * @return string
     */
    public function getDatasetName()
    {
        return $this->container['datasetName'];
    }

    /**
     * Sets datasetName
     * @param string $datasetName
     * @return $this
     */
    public function setDatasetName($datasetName)
    {
        $this->container['datasetName'] = $datasetName;

        return $this;
    }


    /**
     * Gets datasetUUID
     * @return string
     */
    public function getDatasetUUID()
    {
        return $this->container['datasetUUID'];
    }

    /**
     * Sets datasetUUID
     * @param string $datasetUUID
     * @return $this
     */
    public function setDatasetUUID($datasetUUID)
    {
        $this->container['datasetUUID'] = $datasetUUID;

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
