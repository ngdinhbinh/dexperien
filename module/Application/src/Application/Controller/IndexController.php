<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	
	public function onDispatch( \Zend\Mvc\MvcEvent $e )
	{
		//Check if login 
		$auth = $this->getServiceLocator()->get('AuthService');		
		if(!$auth->hasIdentity())
			return $this->redirect()->toRoute('login');
		else
		{
			$this->layout()->username = $auth->getIdentity();
			return parent::onDispatch($e);
		}
	}
	
    public function indexAction()
    {
        return new ViewModel();
    }
}
