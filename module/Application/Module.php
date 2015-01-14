<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Model\EntityUserAccessTable;
use Application\Model\EntityTable;
use Application\Model\ModuleTable;
use Application\Model\UserTypeTable;
use Application\Model\EntityUserTable;
use Application\Model\LeadTable;
use Application\Model\LeadConversionRuleTable;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

class Module implements AutoloaderProviderInterface
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager  = $e->getApplication()->getEventManager();		
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
		
		$eventManager->attach('dispatch', array($this, 'loadConfiguration' ));
    }
	 public function loadConfiguration(MvcEvent $e)
    {
        $controller = $e->getTarget();
        $controllerClass = get_class($controller);
		
		$controllerClass = explode("\\",$controllerClass);
        //set 'variable' into layout...		
        $controller->layout()->controllername = $controllerClass[2];
    }
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
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
				'Application\Model\EntityTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new EntityTable($dbAdapter);
                    return $table;
                },
				'Application\Model\ModuleTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new ModuleTable($dbAdapter);
                    return $table;
                },
				'Application\Model\EntityUserTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new EntityUserTable($dbAdapter);
                    return $table;
                },
				'Application\Model\LeadTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new LeadTable($dbAdapter);
                    return $table;
                },
				'Application\Model\LeadConversionRuleTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new LeadConversionRuleTable($dbAdapter);
                    return $table;
                },
                'Application\Model\EntityUserAccessTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new EntityUserAccessTable($dbAdapter);
                    return $table;
                },
                'Application\Model\UserTypeTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new UserTypeTable($dbAdapter);
                    return $table;
                },
				'Application\Model\MyAuthStorage' => function ($sm) {
					return new \Application\Model\MyAuthStorage('zf_tutorial');
				},
				'AuthService' => function ($sm) {
					$dbAdapter      = $sm->get('Zend\Db\Adapter\Adapter');
					$dbTableAuthAdapter  = new DbTableAuthAdapter($dbAdapter, 'tblentityuser','strLoginId','strPassword', 'MD5(?)');
					$authService = new AuthenticationService();
					$authService->setAdapter($dbTableAuthAdapter);
					$authService->setStorage($sm->get('Application\Model\MyAuthStorage'));
					return $authService;
				},
            ),
        );
    }
}
