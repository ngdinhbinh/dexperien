<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class UserController extends AbstractActionController
{
	protected $userTable;

    public function indexAction()
    {
        $renderer = $this->serviceLocator->get('Zend\View\Renderer\RendererInterface');
        $renderer->HeadScript()->appendFile($renderer->basePath() . '/js/index.js','text/javascript');
        return new ViewModel(array(
            'data' => $this->getUserTable()->fetchAll(),
        ));

    }
   
	 public function loginAction()
	 {
		$request = $this->getRequest();  
		$this->view->assign('action', $request->getBaseURL()."/user/login");  
		$this->view->assign('title', 'Login Form');
		$this->view->assign('username', 'User Name');	
		$this->view->assign('password', 'Password');	
		
	 }
}