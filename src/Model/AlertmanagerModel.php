<?php

/**
 * AlertmanagerModel
 *
 * @category Class
 * @package  Rancher
 * @author   Gerb Sterrenburg @ Bumbal
 * @link     https://github.com/freightlive/rancher-php-client
 */

namespace Rancher\Model;

use \ArrayAccess;

class AlertmanagerModel implements ArrayAccess
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
        'additionalPeers',
        'affinity',
        'annotations',
        'baseImage',
        'configMaps',
        'containers',
        'externalUrl',
        'imagePullSecrets',
        'labels',
        'listenLocal',
        'logLevel',
        'name',
        'namespaceId',
        'nodeSelector',
        'paused',
        'podMetadata',
        'priorityClassName',
        'projectId',
        'replicas',
        'resources',
        'retention',
        'routePrefix',
        'secrets',
        'securityContext',
        'serviceAccountName',
        'sha',
        'storage',
        'tag',
        'tolerations',
        'version',
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
        'additionalPeers',
        'affinity',
        'annotations',
        'baseImage',
        'configMaps',
        'containers',
        'externalUrl',
        'imagePullSecrets',
        'labels',
        'listenLocal',
        'logLevel',
        'nodeSelector',
        'paused',
        'podMetadata',
        'priorityClassName',
        'replicas',
        'resources',
        'retention',
        'routePrefix',
        'secrets',
        'securityContext',
        'serviceAccountName',
        'sha',
        'storage',
        'tag',
        'tolerations',
        'version',
    ];

    public static function canBeUpdated()
    {
        return self::$canBeUpdated;
    }

    protected static $typeMap = [
        'additionalPeers' => 'string[]',
        'affinity' => '\Rancher\Model\AffinityModel',
        'annotations' => 'map[string,string]',
        'baseImage' => 'string',
        'configMaps' => 'string[]',
        'containers' => '\Rancher\Model\ContainerModel[]',
        'created' => '\DateTime',
        'creatorId' => 'string',
        'externalUrl' => 'string',
        'imagePullSecrets' => '\Rancher\Model\LocalObjectReferenceModel[]',
        'labels' => 'map[string,string]',
        'listenLocal' => 'boolean',
        'logLevel' => 'string',
        'name' => 'string',
        'namespaceId' => 'string',
        'nodeSelector' => 'map[string,string]',
        'ownerReferences' => '\Rancher\Model\OwnerReferenceModel[]',
        'paused' => 'boolean',
        'podMetadata' => '\Rancher\Model\ObjectMetaModel',
        'priorityClassName' => 'string',
        'projectId' => 'string',
        'removed' => '\DateTime',
        'replicas' => 'int',
        'resources' => '\Rancher\Model\ResourceRequirementsModel',
        'retention' => 'string',
        'routePrefix' => 'string',
        'secrets' => 'string[]',
        'securityContext' => '\Rancher\Model\PodSecurityContextModel',
        'serviceAccountName' => 'string',
        'sha' => 'string',
        'state' => 'string',
        'storage' => '\Rancher\Model\StorageSpecModel',
        'tag' => 'string',
        'tolerations' => '\Rancher\Model\TolerationModel[]',
        'transitioning' => 'string',
        'transitioningMessage' => 'string',
        'uuid' => 'string',
        'version' => 'string',
    ];

    public static function typeMap()
    {
        return self::$typeMap;
    }

    protected static $setters = [
        'additionalPeers' => 'setAdditionalPeers',
        'affinity' => 'setAffinity',
        'annotations' => 'setAnnotations',
        'baseImage' => 'setBaseImage',
        'configMaps' => 'setConfigMaps',
        'containers' => 'setContainers',
        'created' => 'setCreated',
        'creatorId' => 'setCreatorId',
        'externalUrl' => 'setExternalUrl',
        'imagePullSecrets' => 'setImagePullSecrets',
        'labels' => 'setLabels',
        'listenLocal' => 'setListenLocal',
        'logLevel' => 'setLogLevel',
        'name' => 'setName',
        'namespaceId' => 'setNamespaceId',
        'nodeSelector' => 'setNodeSelector',
        'ownerReferences' => 'setOwnerReferences',
        'paused' => 'setPaused',
        'podMetadata' => 'setPodMetadata',
        'priorityClassName' => 'setPriorityClassName',
        'projectId' => 'setProjectId',
        'removed' => 'setRemoved',
        'replicas' => 'setReplicas',
        'resources' => 'setResources',
        'retention' => 'setRetention',
        'routePrefix' => 'setRoutePrefix',
        'secrets' => 'setSecrets',
        'securityContext' => 'setSecurityContext',
        'serviceAccountName' => 'setServiceAccountName',
        'sha' => 'setSha',
        'state' => 'setState',
        'storage' => 'setStorage',
        'tag' => 'setTag',
        'tolerations' => 'setTolerations',
        'transitioning' => 'setTransitioning',
        'transitioningMessage' => 'setTransitioningMessage',
        'uuid' => 'setUuid',
        'version' => 'setVersion',
    ];

    public static function setters()
    {
        return self::$setters;
    }

    protected static $getters = [
        'additionalPeers' => 'getAdditionalPeers',
        'affinity' => 'getAffinity',
        'annotations' => 'getAnnotations',
        'baseImage' => 'getBaseImage',
        'configMaps' => 'getConfigMaps',
        'containers' => 'getContainers',
        'created' => 'getCreated',
        'creatorId' => 'getCreatorId',
        'externalUrl' => 'getExternalUrl',
        'imagePullSecrets' => 'getImagePullSecrets',
        'labels' => 'getLabels',
        'listenLocal' => 'getListenLocal',
        'logLevel' => 'getLogLevel',
        'name' => 'getName',
        'namespaceId' => 'getNamespaceId',
        'nodeSelector' => 'getNodeSelector',
        'ownerReferences' => 'getOwnerReferences',
        'paused' => 'getPaused',
        'podMetadata' => 'getPodMetadata',
        'priorityClassName' => 'getPriorityClassName',
        'projectId' => 'getProjectId',
        'removed' => 'getRemoved',
        'replicas' => 'getReplicas',
        'resources' => 'getResources',
        'retention' => 'getRetention',
        'routePrefix' => 'getRoutePrefix',
        'secrets' => 'getSecrets',
        'securityContext' => 'getSecurityContext',
        'serviceAccountName' => 'getServiceAccountName',
        'sha' => 'getSha',
        'state' => 'getState',
        'storage' => 'getStorage',
        'tag' => 'getTag',
        'tolerations' => 'getTolerations',
        'transitioning' => 'getTransitioning',
        'transitioningMessage' => 'getTransitioningMessage',
        'uuid' => 'getUuid',
        'version' => 'getVersion',
    ];

    public static function getters()
    {
        return self::$getters;
    }

    public function __construct(array $data = null)
    {
        $this->container['additionalPeers'] = isset($data['additionalPeers']) ? $data['additionalPeers'] : null;
        $this->container['affinity'] = isset($data['affinity']) ? $data['affinity'] : null;
        $this->container['annotations'] = isset($data['annotations']) ? $data['annotations'] : null;
        $this->container['baseImage'] = isset($data['baseImage']) ? $data['baseImage'] : null;
        $this->container['configMaps'] = isset($data['configMaps']) ? $data['configMaps'] : null;
        $this->container['containers'] = isset($data['containers']) ? $data['containers'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['creatorId'] = isset($data['creatorId']) ? $data['creatorId'] : null;
        $this->container['externalUrl'] = isset($data['externalUrl']) ? $data['externalUrl'] : null;
        $this->container['imagePullSecrets'] = isset($data['imagePullSecrets']) ? $data['imagePullSecrets'] : null;
        $this->container['labels'] = isset($data['labels']) ? $data['labels'] : null;
        $this->container['listenLocal'] = isset($data['listenLocal']) ? $data['listenLocal'] : null;
        $this->container['logLevel'] = isset($data['logLevel']) ? $data['logLevel'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['namespaceId'] = isset($data['namespaceId']) ? $data['namespaceId'] : null;
        $this->container['nodeSelector'] = isset($data['nodeSelector']) ? $data['nodeSelector'] : null;
        $this->container['ownerReferences'] = isset($data['ownerReferences']) ? $data['ownerReferences'] : null;
        $this->container['paused'] = isset($data['paused']) ? $data['paused'] : null;
        $this->container['podMetadata'] = isset($data['podMetadata']) ? $data['podMetadata'] : null;
        $this->container['priorityClassName'] = isset($data['priorityClassName']) ? $data['priorityClassName'] : null;
        $this->container['projectId'] = isset($data['projectId']) ? $data['projectId'] : null;
        $this->container['removed'] = isset($data['removed']) ? $data['removed'] : null;
        $this->container['replicas'] = isset($data['replicas']) ? $data['replicas'] : null;
        $this->container['resources'] = isset($data['resources']) ? $data['resources'] : null;
        $this->container['retention'] = isset($data['retention']) ? $data['retention'] : null;
        $this->container['routePrefix'] = isset($data['routePrefix']) ? $data['routePrefix'] : null;
        $this->container['secrets'] = isset($data['secrets']) ? $data['secrets'] : null;
        $this->container['securityContext'] = isset($data['securityContext']) ? $data['securityContext'] : null;
        $this->container['serviceAccountName'] = isset($data['serviceAccountName']) ? $data['serviceAccountName'] : null;
        $this->container['sha'] = isset($data['sha']) ? $data['sha'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['storage'] = isset($data['storage']) ? $data['storage'] : null;
        $this->container['tag'] = isset($data['tag']) ? $data['tag'] : null;
        $this->container['tolerations'] = isset($data['tolerations']) ? $data['tolerations'] : null;
        $this->container['transitioning'] = isset($data['transitioning']) ? $data['transitioning'] : null;
        $this->container['transitioningMessage'] = isset($data['transitioningMessage']) ? $data['transitioningMessage'] : null;
        $this->container['uuid'] = isset($data['uuid']) ? $data['uuid'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
    }

    /**
     * Gets additionalPeers
     * @return string[]
     */
    public function getAdditionalPeers()
    {
        return $this->container['additionalPeers'];
    }

    /**
     * Sets additionalPeers
     * @param string[] $additionalPeers
     * @return $this
     */
    public function setAdditionalPeers($additionalPeers)
    {
        $this->container['additionalPeers'] = $additionalPeers;

        return $this;
    }


    /**
     * Gets affinity
     * @return \Rancher\Model\AffinityModel
     */
    public function getAffinity()
    {
        return $this->container['affinity'];
    }

    /**
     * Sets affinity
     * @param \Rancher\Model\AffinityModel $affinity
     * @return $this
     */
    public function setAffinity($affinity)
    {
        $this->container['affinity'] = $affinity;

        return $this;
    }


    /**
     * Gets annotations
     * @return string[]
     */
    public function getAnnotations()
    {
        return $this->container['annotations'];
    }

    /**
     * Sets annotations
     * @param string[] $annotations
     * @return $this
     */
    public function setAnnotations($annotations)
    {
        $this->container['annotations'] = $annotations;

        return $this;
    }


    /**
     * Gets baseImage
     * @return string
     */
    public function getBaseImage()
    {
        return $this->container['baseImage'];
    }

    /**
     * Sets baseImage
     * @param string $baseImage
     * @return $this
     */
    public function setBaseImage($baseImage)
    {
        $this->container['baseImage'] = $baseImage;

        return $this;
    }


    /**
     * Gets configMaps
     * @return string[]
     */
    public function getConfigMaps()
    {
        return $this->container['configMaps'];
    }

    /**
     * Sets configMaps
     * @param string[] $configMaps
     * @return $this
     */
    public function setConfigMaps($configMaps)
    {
        $this->container['configMaps'] = $configMaps;

        return $this;
    }


    /**
     * Gets containers
     * @return \Rancher\Model\ContainerModel[]
     */
    public function getContainers()
    {
        return $this->container['containers'];
    }

    /**
     * Sets containers
     * @param \Rancher\Model\ContainerModel[] $containers
     * @return $this
     */
    public function setContainers($containers)
    {
        $this->container['containers'] = $containers;

        return $this;
    }


    /**
     * Gets created
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     * @param \DateTime $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

        return $this;
    }


    /**
     * Gets creatorId
     * @return string
     */
    public function getCreatorId()
    {
        return $this->container['creatorId'];
    }

    /**
     * Sets creatorId
     * @param string $creatorId
     * @return $this
     */
    public function setCreatorId($creatorId)
    {
        $this->container['creatorId'] = $creatorId;

        return $this;
    }


    /**
     * Gets externalUrl
     * @return string
     */
    public function getExternalUrl()
    {
        return $this->container['externalUrl'];
    }

    /**
     * Sets externalUrl
     * @param string $externalUrl
     * @return $this
     */
    public function setExternalUrl($externalUrl)
    {
        $this->container['externalUrl'] = $externalUrl;

        return $this;
    }


    /**
     * Gets imagePullSecrets
     * @return \Rancher\Model\LocalObjectReferenceModel[]
     */
    public function getImagePullSecrets()
    {
        return $this->container['imagePullSecrets'];
    }

    /**
     * Sets imagePullSecrets
     * @param \Rancher\Model\LocalObjectReferenceModel[] $imagePullSecrets
     * @return $this
     */
    public function setImagePullSecrets($imagePullSecrets)
    {
        $this->container['imagePullSecrets'] = $imagePullSecrets;

        return $this;
    }


    /**
     * Gets labels
     * @return string[]
     */
    public function getLabels()
    {
        return $this->container['labels'];
    }

    /**
     * Sets labels
     * @param string[] $labels
     * @return $this
     */
    public function setLabels($labels)
    {
        $this->container['labels'] = $labels;

        return $this;
    }


    /**
     * Gets listenLocal
     * @return boolean
     */
    public function getListenLocal()
    {
        return $this->container['listenLocal'];
    }

    /**
     * Sets listenLocal
     * @param boolean $listenLocal
     * @return $this
     */
    public function setListenLocal($listenLocal)
    {
        $this->container['listenLocal'] = $listenLocal;

        return $this;
    }


    /**
     * Gets logLevel
     * @return string
     */
    public function getLogLevel()
    {
        return $this->container['logLevel'];
    }

    /**
     * Sets logLevel
     * @param string $logLevel
     * @return $this
     */
    public function setLogLevel($logLevel)
    {
        $this->container['logLevel'] = $logLevel;

        return $this;
    }


    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }


    /**
     * Gets namespaceId
     * @return string
     */
    public function getNamespaceId()
    {
        return $this->container['namespaceId'];
    }

    /**
     * Sets namespaceId
     * @param string $namespaceId
     * @return $this
     */
    public function setNamespaceId($namespaceId)
    {
        $this->container['namespaceId'] = $namespaceId;

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
     * Gets ownerReferences
     * @return \Rancher\Model\OwnerReferenceModel[]
     */
    public function getOwnerReferences()
    {
        return $this->container['ownerReferences'];
    }

    /**
     * Sets ownerReferences
     * @param \Rancher\Model\OwnerReferenceModel[] $ownerReferences
     * @return $this
     */
    public function setOwnerReferences($ownerReferences)
    {
        $this->container['ownerReferences'] = $ownerReferences;

        return $this;
    }


    /**
     * Gets paused
     * @return boolean
     */
    public function getPaused()
    {
        return $this->container['paused'];
    }

    /**
     * Sets paused
     * @param boolean $paused
     * @return $this
     */
    public function setPaused($paused)
    {
        $this->container['paused'] = $paused;

        return $this;
    }


    /**
     * Gets podMetadata
     * @return \Rancher\Model\ObjectMetaModel
     */
    public function getPodMetadata()
    {
        return $this->container['podMetadata'];
    }

    /**
     * Sets podMetadata
     * @param \Rancher\Model\ObjectMetaModel $podMetadata
     * @return $this
     */
    public function setPodMetadata($podMetadata)
    {
        $this->container['podMetadata'] = $podMetadata;

        return $this;
    }


    /**
     * Gets priorityClassName
     * @return string
     */
    public function getPriorityClassName()
    {
        return $this->container['priorityClassName'];
    }

    /**
     * Sets priorityClassName
     * @param string $priorityClassName
     * @return $this
     */
    public function setPriorityClassName($priorityClassName)
    {
        $this->container['priorityClassName'] = $priorityClassName;

        return $this;
    }


    /**
     * Gets projectId
     * @return string
     */
    public function getProjectId()
    {
        return $this->container['projectId'];
    }

    /**
     * Sets projectId
     * @param string $projectId
     * @return $this
     */
    public function setProjectId($projectId)
    {
        $this->container['projectId'] = $projectId;

        return $this;
    }


    /**
     * Gets removed
     * @return \DateTime
     */
    public function getRemoved()
    {
        return $this->container['removed'];
    }

    /**
     * Sets removed
     * @param \DateTime $removed
     * @return $this
     */
    public function setRemoved($removed)
    {
        $this->container['removed'] = $removed;

        return $this;
    }


    /**
     * Gets replicas
     * @return int
     */
    public function getReplicas()
    {
        return $this->container['replicas'];
    }

    /**
     * Sets replicas
     * @param int $replicas
     * @return $this
     */
    public function setReplicas($replicas)
    {
        $this->container['replicas'] = $replicas;

        return $this;
    }


    /**
     * Gets resources
     * @return \Rancher\Model\ResourceRequirementsModel
     */
    public function getResources()
    {
        return $this->container['resources'];
    }

    /**
     * Sets resources
     * @param \Rancher\Model\ResourceRequirementsModel $resources
     * @return $this
     */
    public function setResources($resources)
    {
        $this->container['resources'] = $resources;

        return $this;
    }


    /**
     * Gets retention
     * @return string
     */
    public function getRetention()
    {
        return $this->container['retention'];
    }

    /**
     * Sets retention
     * @param string $retention
     * @return $this
     */
    public function setRetention($retention)
    {
        $this->container['retention'] = $retention;

        return $this;
    }


    /**
     * Gets routePrefix
     * @return string
     */
    public function getRoutePrefix()
    {
        return $this->container['routePrefix'];
    }

    /**
     * Sets routePrefix
     * @param string $routePrefix
     * @return $this
     */
    public function setRoutePrefix($routePrefix)
    {
        $this->container['routePrefix'] = $routePrefix;

        return $this;
    }


    /**
     * Gets secrets
     * @return string[]
     */
    public function getSecrets()
    {
        return $this->container['secrets'];
    }

    /**
     * Sets secrets
     * @param string[] $secrets
     * @return $this
     */
    public function setSecrets($secrets)
    {
        $this->container['secrets'] = $secrets;

        return $this;
    }


    /**
     * Gets securityContext
     * @return \Rancher\Model\PodSecurityContextModel
     */
    public function getSecurityContext()
    {
        return $this->container['securityContext'];
    }

    /**
     * Sets securityContext
     * @param \Rancher\Model\PodSecurityContextModel $securityContext
     * @return $this
     */
    public function setSecurityContext($securityContext)
    {
        $this->container['securityContext'] = $securityContext;

        return $this;
    }


    /**
     * Gets serviceAccountName
     * @return string
     */
    public function getServiceAccountName()
    {
        return $this->container['serviceAccountName'];
    }

    /**
     * Sets serviceAccountName
     * @param string $serviceAccountName
     * @return $this
     */
    public function setServiceAccountName($serviceAccountName)
    {
        $this->container['serviceAccountName'] = $serviceAccountName;

        return $this;
    }


    /**
     * Gets sha
     * @return string
     */
    public function getSha()
    {
        return $this->container['sha'];
    }

    /**
     * Sets sha
     * @param string $sha
     * @return $this
     */
    public function setSha($sha)
    {
        $this->container['sha'] = $sha;

        return $this;
    }


    /**
     * Gets state
     * @return string
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     * @param string $state
     * @return $this
     */
    public function setState($state)
    {
        $this->container['state'] = $state;

        return $this;
    }


    /**
     * Gets storage
     * @return \Rancher\Model\StorageSpecModel
     */
    public function getStorage()
    {
        return $this->container['storage'];
    }

    /**
     * Sets storage
     * @param \Rancher\Model\StorageSpecModel $storage
     * @return $this
     */
    public function setStorage($storage)
    {
        $this->container['storage'] = $storage;

        return $this;
    }


    /**
     * Gets tag
     * @return string
     */
    public function getTag()
    {
        return $this->container['tag'];
    }

    /**
     * Sets tag
     * @param string $tag
     * @return $this
     */
    public function setTag($tag)
    {
        $this->container['tag'] = $tag;

        return $this;
    }


    /**
     * Gets tolerations
     * @return \Rancher\Model\TolerationModel[]
     */
    public function getTolerations()
    {
        return $this->container['tolerations'];
    }

    /**
     * Sets tolerations
     * @param \Rancher\Model\TolerationModel[] $tolerations
     * @return $this
     */
    public function setTolerations($tolerations)
    {
        $this->container['tolerations'] = $tolerations;

        return $this;
    }


    /**
     * Gets transitioning
     * @return string
     */
    public function getTransitioning()
    {
        return $this->container['transitioning'];
    }

    /**
     * Sets transitioning
     * @param string $transitioning
     * @return $this
     */
    public function setTransitioning($transitioning)
    {
        $this->container['transitioning'] = $transitioning;

        return $this;
    }


    /**
     * Gets transitioningMessage
     * @return string
     */
    public function getTransitioningMessage()
    {
        return $this->container['transitioningMessage'];
    }

    /**
     * Sets transitioningMessage
     * @param string $transitioningMessage
     * @return $this
     */
    public function setTransitioningMessage($transitioningMessage)
    {
        $this->container['transitioningMessage'] = $transitioningMessage;

        return $this;
    }


    /**
     * Gets uuid
     * @return string
     */
    public function getUuid()
    {
        return $this->container['uuid'];
    }

    /**
     * Sets uuid
     * @param string $uuid
     * @return $this
     */
    public function setUuid($uuid)
    {
        $this->container['uuid'] = $uuid;

        return $this;
    }


    /**
     * Gets version
     * @return string
     */
    public function getVersion()
    {
        return $this->container['version'];
    }

    /**
     * Sets version
     * @param string $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->container['version'] = $version;

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

