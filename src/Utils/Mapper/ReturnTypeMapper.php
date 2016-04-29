<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReturnTypeMapper
 *
 * @author hayk
 */

namespace Utils\Mapper;

class ReturnTypeMapper {

    /**
     * Return types
     */
    const RETURN_TYPE_ARRAY = 0;
    const RETURN_TYPE_OBJECT = 1;

    /**
     * Return type titles
     */
    const RETURN_TITLE_ARRAY = 'Array';
    const RETURN_TITLE_OBJECT = 'Objcet';

    private static $_returnTypeMap = [
        self::RETURN_TYPE_ARRAY => self::RETURN_TITLE_ARRAY,
        self::RETURN_TYPE_OBJECT => self::RETURN_TITLE_OBJECT,
    ];

    public static function getReturnTypes()
    {
        return self::$_returnTypeMap;
    }

    public static function getReturnTypeTitle($rType)
    {
        if (!in_array($rType, self::$_returnTypeMap)) {
            return self::RETURN_TYPE_ARRAY;
        }

        return self::$_returnTypeMap[$rType];
    }

}
