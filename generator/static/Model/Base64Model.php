<?php

namespace Rancher\Model;

use \ArrayAccess;

class Base64Model implements ArrayAccess {

    /**
     * Container with all data
     *
     * @var array
     */
    protected $container = [];	
	
    protected static $typeMap = [
		'encodedString' => 'string',
	];

    public static function typeMap()
    {
        return self::$typeMap;
	}
	
    public function __construct(array $data = null)
    {
        $this->container['encodedString'] = isset($data['encodedString']) ? $data['encodedString'] : null;
	}

    /**
     * Gets encodedString
     * @return string[]
     */
    public function getEncodedString()
    {
        return $this->container['encodedString'];
    }

    /**
     * Sets encodedString
     * @param string[] $annotations
     * @return $this
     */
    public function setEncodedString($encodedString)
    {
        $this->container['encodedString'] = $encodedString;

        return $this;
	}
	
	public function decode()
	{
		return base64_decode($this->container['encodedString']);
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