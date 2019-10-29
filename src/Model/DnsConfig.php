<?php

namespace Rancher\Model;

use \ArrayAccess;

class DnsConfig implements ArrayAccess
{
    protected $container = [];

    protected static $typeMap = [
        'nodeSelector' => 'map[string]',
        'provider' => 'string',
        'reversecidrs' => 'string[]',
        'upstreamnameservers' => 'string[]',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'nodeSelector' => 'setNodeSelector',
        'provider' => 'setProvider',
        'reversecidrs' => 'setReversecidrs',
        'upstreamnameservers' => 'setUpstreamnameservers',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'nodeSelector' => 'getNodeSelector',
        'provider' => 'getProvider',
        'reversecidrs' => 'getReversecidrs',
        'upstreamnameservers' => 'getUpstreamnameservers',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['nodeSelector'] = isset($data['nodeSelector']) ? $data['nodeSelector'] : null;
        $this->container['provider'] = isset($data['provider']) ? $data['provider'] : null;
        $this->container['reversecidrs'] = isset($data['reversecidrs']) ? $data['reversecidrs'] : null;
        $this->container['upstreamnameservers'] = isset($data['upstreamnameservers']) ? $data['upstreamnameservers'] : null;
    }

    /**
     * Gets nodeSelector
     * @return string[]
     */
    public function getNodeSelector()
    {
        return $this->container['nodeSelector'];
    }

    /**
     * Sets nodeSelector
     * @param string[] $nodeSelector
     * @return $this
     */
    public function setNodeSelector($nodeSelector)
    {
        $this->container['nodeSelector'] = $nodeSelector;

        return $this;
    }


    /**
     * Gets provider
     * @return string
     */
    public function getProvider()
    {
        return $this->container['provider'];
    }

    /**
     * Sets provider
     * @param string $provider
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->container['provider'] = $provider;

        return $this;
    }


    /**
     * Gets reversecidrs
     * @return string[]
     */
    public function getReversecidrs()
    {
        return $this->container['reversecidrs'];
    }

    /**
     * Sets reversecidrs
     * @param string[] $reversecidrs
     * @return $this
     */
    public function setReversecidrs($reversecidrs)
    {
        $this->container['reversecidrs'] = $reversecidrs;

        return $this;
    }


    /**
     * Gets upstreamnameservers
     * @return string[]
     */
    public function getUpstreamnameservers()
    {
        return $this->container['upstreamnameservers'];
    }

    /**
     * Sets upstreamnameservers
     * @param string[] $upstreamnameservers
     * @return $this
     */
    public function setUpstreamnameservers($upstreamnameservers)
    {
        $this->container['upstreamnameservers'] = $upstreamnameservers;

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
