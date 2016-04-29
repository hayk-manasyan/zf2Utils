<?php

/**
 * Description of NumericOperations
 *
 * @author hayk
 */

namespace Utils\Service;

class NumericOperations {

    /**
     * Generates random code with 4 digits
     * 
     * @return int
     */
    public static function generateRandomCode()
    {
        $result = mt_rand(1000, 9999);

        return (int) $result;
    }

}
