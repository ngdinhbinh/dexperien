<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class EntityUserAccessController extends AbstractActionController
{
	protected $entityUserAccessTable;
	
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
        $renderer = $this->serviceLocator->get('Zend\View\Renderer\RendererInterface');
        $renderer->HeadScript()->appendFile($renderer->basePath() . '/js/index.js','text/javascript');
        return new ViewModel(array(
            'data' => $this->getEntityUserAccessTable()->fetchAll(),
        ));
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        $model = $this->getEntityUserAccessTable()->getItem($id);
        return new ViewModel(array(
            'model' => $model,
        ));
    }

    public function saveAction()
    {
		$loginName = $this->getServiceLocator()->get('AuthService')->getIdentity();	
		
        $request = $this->getRequest();
        if ($request->isPost()) {
            $formData = ($request->getPost());
            $idUserAccess = $request->getPost("idUserAccess");
            $data= array(
                "idUserAccess"=>$idUserAccess,
                "idUser"=>$request->getPost("idUser"),
				"idModule"=>$request->getPost("idModule"),
				"intAccess"=>$request->getPost("intAccess"),
				"intView"=>$request->getPost("intView"),
				"intAdd"=>$request->getPost("intAdd"),
				"intDelete"=>$request->getPost("intDelete"),
				"intEdit"=>$request->getPost("intEdit")
            );
            
            $this->getEntityUserAccessTable()->saveItem($data);

            return $this->redirect()->toRoute('home/default', array(
                'controller' => 'entity-user-access'
            ));
        }
    }

    public function deleteAction()
    {
        $id = (int)$this->params('id');
        $this->getEntityUserAccessTable()->deleteItem($id);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }

    public function getEntityUserAccessTable()
    {
        if (!$this->entityUserAccessTable) {
            $sm = $this->getServiceLocator();
            $this->entityUserAccessTable = $sm->get('Application\Model\EntityUserAccessTable');
        }
        return $this->entityUserAccessTable;
    }
}