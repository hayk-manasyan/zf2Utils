<?php

/**
 * Description of ObjectService
 *
 * @author hayk
 */

namespace Utils\Service;

use Exception;
use stdClass;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Parameters;

class ObjectService {

    /**
     * Convert Object to array
     * 
     * @param object $obj
     * @return array
     * @throws Exception
     */
    public static function convertObjToArray($obj)
    {
        if (!is_object($obj)) {
            throw new Exception('No object was given');
        }
        if ($obj instanceof stdClass) {
            return (array) $obj;
        }

        $hydrator = new ClassMethods();
        $data = $hydrator->extract($obj);
        unset($hydrator);
        unset($obj);

        return $data;
    }

    /**
     * Convert given array to object
     *  - If $prototype is NULL, convert to stdClass Object
     *  - Otherwise convert array to give prototype
     * 
     * @param arry $data
     * @param Object|NULL $prototype
     * @return Object
     * @throws Exception
     */
    public static function convertArrayToObj($data, $prototype = null)
    {
        if ($data instanceof stdClass || $data instanceof Parameters) {
            $data = (array) $data;
        }

        if (!is_array($data)) {
            throw new Exception('No array was given');
        }

        if (is_null($prototype)) {
            $prototype = new stdClass();
        }

        $hydrator = new ClassMethods();

        $obj = $hydrator->hydrate($data, $prototype);
        unset($hydrator);
        unset($prototype);
        unset($data);

        return $obj;
    }

}
