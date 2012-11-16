<?php
namespace Album;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
          'Zend\Loader\ClassMapAutoloader' => array(
              __DIR__ . '/autoload_classmap.php',
          ),
            'Zend\Loader\StandardAutoloader'=> array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Album\Model\AlbumTable' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new \Album\Model\AlbumTable($dbAdapter);
                    return $table;
                },
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}