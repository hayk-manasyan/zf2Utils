<?php

/**
 * Description of HttpService
 *
 * @author hayk
 */

namespace Utils\Service;

use Exception;
use stdClass;

class HttpService {

    const STATUS_OK = 'ok';
    const STATUS_NOT_OK = 'nok';
    const BASE_URL = 'http://example.com';

    /**
     * Make Curl call to given path and params
     * 
     * @param string $path 
     * @param array $params
     * @return stdClass
     * @throws Exception
     */
    public static function makeRestCall($path, $params = NULL)
    {
        $service_url = self::BASE_URL . $path;
        $curl = curl_init($service_url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        $curl_response = curl_exec($curl);

        $decoded = json_decode($curl_response);
        if ($decoded instanceof stdClass) {
            return $decoded;
        }

        throw new Exception('Internal Error!');
    }

}
