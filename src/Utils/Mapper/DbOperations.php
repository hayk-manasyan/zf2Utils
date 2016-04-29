<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbOperations
 *
 * @author hayk
 */

namespace Utils\Mapper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

abstract class DbOperations implements ServiceLocatorAwareInterface {

    private $dbAdapter;
    private $serviceLocator;
    protected $hydrator;

    public function __construct()
    {
        $this->hydrator = new ClassMethods();
    }

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {

        $this->serviceLocator = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    public function setDbAdapter()
    {
        $this->dbAdapter = $this->serviceLocator->get('dbAdapter');
    }

    public function getDbAdapter()
    {
        if (NULL === $this->dbAdapter) {
            $this->setDbAdapter();
        }

        return $this->dbAdapter;
    }

}
