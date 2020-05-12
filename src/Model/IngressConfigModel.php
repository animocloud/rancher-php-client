<?php

/**
 * IngressConfigModel
 *
 * @category Class
 * @package  Rancher
 * @author   Gerb Sterrenburg @ Bumbal
 * @link     https://github.com/freightlive/rancher-php-client
 */

namespace Rancher\Model;

use \ArrayAccess;

class IngressConfigModel implements ArrayAccess
{
    /**
     * Container with all data
     *
     * @var array
     */
    protected $container = [];

    /**
     * Properties that can be created
     *
     * @var array
     */
    protected static $canBeCreated = [
        'dnsPolicy',
        'extraArgs',
        'extraEnvs',
        'extraVolumeMounts',
        'extraVolumes',
        'nodeSelector',
        'options',
        'provider',
    ];

    public static function canBeCreated()
    {
        return self::$canBeCreated;
    }

    /**
     * Properties that can be updated
     *
     * @var array
     */
    protected static $canBeUpdated = [
        'dnsPolicy',
        'extraArgs',
        'extraEnvs',
        'extraVolumeMounts',
        'extraVolumes',
        'nodeSelector',
        'options',
        'provider',
    ];

    public static function canBeUpdated()
    {
        return self::$canBeUpdated;
    }

    protected static $typeMap = [
        'dnsPolicy' => 'string',
        'extraArgs' => 'map[string,string]',
        'extraEnvs' => '\Rancher\Model\JsonModel[]',
        'extraVolumeMounts' => '\Rancher\Model\JsonModel[]',
        'extraVolumes' => '\Rancher\Model\JsonModel[]',
        'nodeSelector' => 'map[string,string]',
        'options' => 'map[string,string]',
        'provider' => 'string',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'dnsPolicy' => 'setDnsPolicy',
        'extraArgs' => 'setExtraArgs',
        'extraEnvs' => 'setExtraEnvs',
        'extraVolumeMounts' => 'setExtraVolumeMounts',
        'extraVolumes' => 'setExtraVolumes',
        'nodeSelector' => 'setNodeSelector',
        'options' => 'setOptions',
        'provider' => 'setProvider',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'dnsPolicy' => 'getDnsPolicy',
        'extraArgs' => 'getExtraArgs',
        'extraEnvs' => 'getExtraEnvs',
        'extraVolumeMounts' => 'getExtraVolumeMounts',
        'extraVolumes' => 'getExtraVolumes',
        'nodeSelector' => 'getNodeSelector',
        'options' => 'getOptions',
        'provider' => 'getProvider',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['dnsPolicy'] = isset($data['dnsPolicy']) ? $data['dnsPolicy'] : null;
        $this->container['extraArgs'] = isset($data['extraArgs']) ? $data['extraArgs'] : null;
        $this->container['extraEnvs'] = isset($data['extraEnvs']) ? $data['extraEnvs'] : null;
        $this->container['extraVolumeMounts'] = isset($data['extraVolumeMounts']) ? $data['extraVolumeMounts'] : null;
        $this->container['extraVolumes'] = isset($data['extraVolumes']) ? $data['extraVolumes'] : null;
        $this->container['nodeSelector'] = isset($data['nodeSelector']) ? $data['nodeSelector'] : null;
        $this->container['options'] = isset($data['options']) ? $data['options'] : null;
        $this->container['provider'] = isset($data['provider']) ? $data['provider'] : null;
    }

    /**
     * Gets dnsPolicy
     * @return string
     */
    public function getDnsPolicy()
    {
        return $this->container['dnsPolicy'];
    }

    /**
     * Sets dnsPolicy
     * @param string $dnsPolicy
     * @return $this
     */
    public function setDnsPolicy($dnsPolicy)
    {
        $this->container['dnsPolicy'] = $dnsPolicy;

        return $this;
    }


    /**
     * Gets extraArgs
     * @return string[]
     */
    public function getExtraArgs()
    {
        return $this->container['extraArgs'];
    }

    /**
     * Sets extraArgs
     * @param string[] $extraArgs
     * @return $this
     */
    public function setExtraArgs($extraArgs)
    {
        $this->container['extraArgs'] = $extraArgs;

        return $this;
    }


    /**
     * Gets extraEnvs
     * @return \Rancher\Model\JsonModel[]
     */
    public function getExtraEnvs()
    {
        return $this->container['extraEnvs'];
    }

    /**
     * Sets extraEnvs
     * @param \Rancher\Model\JsonModel[] $extraEnvs
     * @return $this
     */
    public function setExtraEnvs($extraEnvs)
    {
        $this->container['extraEnvs'] = $extraEnvs;

        return $this;
    }


    /**
     * Gets extraVolumeMounts
     * @return \Rancher\Model\JsonModel[]
     */
    public function getExtraVolumeMounts()
    {
        return $this->container['extraVolumeMounts'];
    }

    /**
     * Sets extraVolumeMounts
     * @param \Rancher\Model\JsonModel[] $extraVolumeMounts
     * @return $this
     */
    public function setExtraVolumeMounts($extraVolumeMounts)
    {
        $this->container['extraVolumeMounts'] = $extraVolumeMounts;

        return $this;
    }


    /**
     * Gets extraVolumes
     * @return \Rancher\Model\JsonModel[]
     */
    public function getExtraVolumes()
    {
        return $this->container['extraVolumes'];
    }

    /**
     * Sets extraVolumes
     * @param \Rancher\Model\JsonModel[] $extraVolumes
     * @return $this
     */
    public function setExtraVolumes($extraVolumes)
    {
        $this->container['extraVolumes'] = $extraVolumes;

        return $this;
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
     * Gets options
     * @return string[]
     */
    public function getOptions()
    {
        return $this->container['options'];
    }

    /**
     * Sets options
     * @param string[] $options
     * @return $this
     */
    public function setOptions($options)
    {
        $this->container['options'] = $options;

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

