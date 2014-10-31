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

use Application\Model\UserProfile;
use Application\Model\Users;
class IndexController extends AbstractActionController
{
	protected $userprofileTable;
	
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
    	$listUserProfile = $this->getUserProfileTable()->fetchAll();
    	if(count($listUserProfile)==0)
    	{
    		$data = array(
    			'idUser'=>0,
                'strName' => 'administrator',
                'strEmail' => 'nmc0987@gmail.com',
                'idUserType' => '1',
                'strDepartment' => '',
                'intPhoneNumber' => '',
                'intMobileNumber' => ''
            );
            $data['strUserId'] = 'administrator';
            $data['strPassword'] = md5('123456');
            $data['dtLastLogin'] = date('Y-m-d H:i:s');
            $data['strLastLoginIP'] = $_SERVER['REMOTE_ADDR'];
            $data['intLoginFailed'] = 0;
            $data['dtLastLoginFailed'] = '0000-00-00 00:00:00';
            $data['strLastLoginFailedIP'] = '127.0.0.1';
            $data['intStatus'] = 0;
            $data['strCreatedBy'] = '';
            $data['dtCreatedDate'] = date('Y-m-d H:i:s');
            $data['strLastModBy'] = '';
            $data['dtLastModDate'] = date('Y-m-d H:i:s');
            $this->getUserProfileTable()->saveItem($data);
    	}
        return new ViewModel();
    }
	public function loginAction()
    {	 
		$this->layout('layout/layout_login');
		$request = $this->getRequest();
        if ($request->isPost()) {           
            $username = $request->getPost("username");
			$password = $request->getPost("password");   
			return $this->redirect()->toRoute('home/default', array(
                'controller' => 'user-type'
            ));
        }
		
    }
    public function getUserProfileTable()
    {
        if (!$this->userprofileTable) {
            $sm = $this->getServiceLocator();
            $this->userprofileTable = $sm->get('Application\Model\UserProfileTable');
        }
        return $this->userprofileTable;
    }


}
