<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Annotation\AnnotationBuilder;
use Application\Model\EntityUserAccessTable;

class AuthController extends AbstractActionController
{
    protected $form;
    protected $storage;
    protected $authservice;
	protected $tblEntityUserAccess;
	
    public function getAuthService()
    {
        if (! $this->authservice) {
            $this->authservice = $this->getServiceLocator()
                                      ->get('AuthService');
        }
        return $this->authservice;
    }

    public function getSessionStorage()
    {
        if (! $this->storage) {
            $this->storage = $this->getServiceLocator()
                                  ->get('Application\Model\MyAuthStorage');
        }
        return $this->storage;
    }

    public function loginAction()
    {
		$this->layout('layout/layout_login');
        //if already login, redirect to success page		
        if ($this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute('home/default', array(
						'controller' => 'index'
			));
        }		
    }

    public function authenticateAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {     
			//check authentication...
            $this->getAuthService()->getAdapter()
                                    ->setIdentity($request->getPost('username'))
                                    ->setCredential($request->getPost('password'));

            $result = $this->getAuthService()->authenticate();
            foreach ($result->getMessages() as $message) {
                //save message temporary into flashmessenger
                $this->flashmessenger()->addMessage($message);
            }
			if ($result->isValid()) {
				//check if it has rememberMe :
                $this->getAuthService()->setStorage($this->getSessionStorage());
                $this->getAuthService()->getStorage()->write($request->getPost('username'));
				
				//Get Role
				$strUserId = $this->getServiceLocator()->get('AuthService')->getIdentity();	
				
				$this->tblEntityUserAccess = $this->getEntityUserAccessTable();
				$tblRole = $this->tblEntityUserAccess->getItemBystrLoginId($strUserId);
				$access = "";
				foreach($tblRole as $key=>$value){
					if($value['intAccess'] == 1 ){
						$access .= $value['strModuleUrl']."|";
					}
				}
				$_SESSION['accessRight'] = $access;
				
				return $this->redirect()->toRoute('home/default', array(
						'controller' => 'index'
				));
			}else{
					return $this->redirect()->toRoute('login');
				}
        }
    }
	public function getEntityUserAccessTable()
    {
        if (!$this->tblEntityUserAccess) {
            $sm = $this->getServiceLocator();
            $this->tblEntityUserAccess = $sm->get('Application\Model\EntityUserAccessTable');
        }
        return $this->tblEntityUserAccess;
    }
	
    public function logoutAction()
    {
        if ($this->getAuthService()->hasIdentity()) {
            $this->getSessionStorage()->forgetMe();
            $this->getAuthService()->clearIdentity();
            $this->flashmessenger()->addMessage("You've been logged out");
        }

        return $this->redirect()->toRoute('login');
    }
}
