<?php

/**
 * ObjectSerializer
 *
 * @category Class
 * @package  Rancher
 * @author   Gerb Sterrenburg @ Bumbal
 * @link     https://github.com/freightlive/rancher-php-client
 */

namespace Rancher;

class ObjectSerializer
{
    /**
     * Serialize data
     *
     * @param mixed  $data          the data to serialize
     * @param string $type          the Type of the data
     * @param string $format        the format of the type of the data
     * @param string $actionType    the type of action create or update
     *
     * @return string|object serialized form of $data
     */
    public static function sanitizeForSerialization($data, $type = null, $format = null, $actionType = 'create')
    {
        if (is_scalar($data) || null === $data)
        {
            return $data;
        }
        elseif ($data instanceof \DateTime)
        {
            return ($format === 'date') ? $data->format('Y-m-d') : $data->format(\DateTime::ATOM);
        }
        elseif (is_array($data))
        {
            foreach ($data as $property => $value)
            {
                $data[$property] = self::sanitizeForSerialization($value, $type, $format, $actionType);
            }

            return $data;
        }
        elseif (is_object($data))
        {
            $values = [];
            $formats = $data::typeMap();

            foreach ($data::typeMap() as $property => $objType)
            {
                $skipProperty = false;

                if($actionType == 'create')
                {
                    if(!in_array($property, $data::canBeCreated()))
                    {
                        $skipProperty = true;
                    }
                }

                if($actionType == 'update')
                {
                    if(!in_array($property, $data::canBeUpdated()))
                    {
                        $skipProperty = true;
                    }
                }

                if(!$skipProperty)
                {
                    $getter = $data::getters()[$property];

                    $value = $data->$getter();

                    if ($value !== null && method_exists($objType, 'getAllowableEnumValues') && !in_array($value, $objType::getAllowableEnumValues()))
                    {
                        $imploded = implode("', '", $objType::getAllowableEnumValues());
                        throw new \InvalidArgumentException("Invalid value for enum '$objType', must be one of: '$imploded'");
                    }

                    if ($value !== null)
                    {
                        $values[$property] = self::sanitizeForSerialization($value, $objType, $formats[$property], $actionType);
                    }
                }
            }

            return (object)$values;
        }
        else
        {
            return (string)$data;
        }
    }

    /**
     * Sanitize filename by removing path.
     * e.g. ../../sun.gif becomes sun.gif
     *
     * @param string $filename filename to be sanitized
     *
     * @return string the sanitized filename
     */
    public static function sanitizeFilename($filename)
    {
        if (preg_match("/.*[\/\\\\](.*)$/", $filename, $match)) {
            return $match[1];
        } else {
            return $filename;
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the path, by url-encoding.
     *
     * @param string $value a string which will be part of the path
     *
     * @return string the serialized object
     */
    public function toPathValue($value)
    {
        return rawurlencode($this->toString($value));
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the query, by imploding comma-separated if it's an object.
     * If it's a string, pass through unchanged. It will be url-encoded
     * later.
     *
     * @param string[]|string|\DateTime $object an object to be serialized to a string
     *
     * @return string the serialized object
     */
    public function toQueryValue($object)
    {
        if (is_array($object)) {
            return implode(',', $object);
        } else {
            return $this->toString($object);
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the header. If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param string $value a string which will be part of the header
     *
     * @return string the header string
     */
    public function toHeaderValue($value)
    {
        return $this->toString($value);
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the http body (form parameter). If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param string|\SplFileObject $value the value of the form parameter
     *
     * @return string the form string
     */
    public function toFormValue($value)
    {
        if ($value instanceof \SplFileObject) {
            return $value->getRealPath();
        } else {
            return $this->toString($value);
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the parameter. If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param string|\DateTime $value the value of the parameter
     *
     * @return string the header string
     */
    public function toString($value)
    {
        if ($value instanceof \DateTime) { // datetime in ISO8601 format
            return $value->format(\DateTime::ATOM);
        } else {
            return $value;
        }
    }

    /**
     * Serialize an array to a string.
     *
     * @param array  $collection                 collection to serialize to a string
     * @param string $collectionFormat           the format use for serialization (csv,
     * ssv, tsv, pipes, multi)
     * @param bool   $allowCollectionFormatMulti allow collection format to be a multidimensional array
     *
     * @return string
     */
    public function serializeCollection(array $collection, $collectionFormat, $allowCollectionFormatMulti = false)
    {
        if ($allowCollectionFormatMulti && ('multi' === $collectionFormat)) {
            // http_build_query() almost does the job for us. We just
            // need to fix the result of multidimensional arrays.
            return preg_replace('/%5B[0-9]+%5D=/', '=', http_build_query($collection, '', '&'));
        }
        switch ($collectionFormat) {
            case 'pipes':
                return implode('|', $collection);

            case 'tsv':
                return implode("\t", $collection);

            case 'ssv':
                return implode(' ', $collection);

            case 'csv':
                // Deliberate fall through. CSV is default format.
            default:
                return implode(',', $collection);
        }
    }

    /**
     * Deserialize a JSON string into an object
     *
     * @param mixed    $data          object or primitive to be deserialized
     * @param string   $class         class name is passed as a string
     * @param string[] $httpHeaders   HTTP headers
     *
     * @return object|array|null an single or an array of $class instances
     */
    public static function deserialize($data, $class, $httpHeaders = null)
    {
        if (null === $data)
        {
            return null;
        }
        elseif (substr($class, 0, 4) === 'map[')
        {
            // for associative array e.g. map[string,int]
            $inner = substr($class, 4, -1);
            $deserialized = [];

            if (strrpos($inner, ",") !== false)
            {
                $subClass_array = explode(',', $inner, 2);
                $subClass = $subClass_array[1];

                foreach ($data as $key => $value)
                {
                    $deserialized[$key] = self::deserialize($value, $subClass, null);
                }
            }

            return $deserialized;
        }
        elseif (strcasecmp(substr($class, -2), '[]') === 0)
        {
            $subClass = substr($class, 0, -2);
            $values = [];

            foreach ($data as $key => $value)
            {
                $values[$key] = self::deserialize($value, $subClass, null);
            }

            return $values;
        }
        elseif ($class === 'object')
        {
            settype($data, 'array');

            return $data;
        }
        elseif ($class === '\DateTime')
        {
            // Some API's return an invalid, empty string as a
            // date-time property. DateTime::__construct() will return
            // the current time for empty input which is probably not
            // what is meant. The invalid empty string is probably to
            // be interpreted as a missing field/value. Let's handle
            // this graceful.
            if (!empty($data))
            {
                return new \DateTime($data);
            }
            else
            {
                return null;
            }
        }
        elseif (in_array($class, ['DateTime', 'bool', 'boolean', 'byte', 'double', 'float', 'int', 'integer', 'mixed', 'number', 'object', 'string', 'void'], true))
        {
            settype($data, $class);

            return $data;
        } elseif ($class === '\Rancher\Model\Base64Model')
        {
            $instance = new $class();

            $instance->setEncodedString($data);

            return $instance;
        }
        else
        {
            $instance = new $class();

            foreach ($instance::typeMap() as $property => $type)
            {
                $propertySetter = $instance::setters()[$property];

                if (!isset($propertySetter) || !isset($data->{$property}))
                {
                    continue;
                }

                $propertyValue = $data->{$property};

                if (isset($propertyValue))
                {
                    $instance->$propertySetter(self::deserialize($propertyValue, $type, null));
                }
            }

            return $instance;
        }
    }
}
