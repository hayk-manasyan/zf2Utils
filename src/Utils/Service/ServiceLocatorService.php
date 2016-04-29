<?php

/**
 * Description of ServiceLocatorService
 *
 * @author hayk
 */

namespace Utils\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class ServiceLocatorService implements ServiceLocatorAwareInterface {

    protected $serviceLocator;

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

}
