<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\EntityTable;


class EntityUserController extends AbstractActionController
{
	protected $entityUserTable;
	protected $entityTable;

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
            'data' => $this->getEntityUserTable()->fetchAll(),
        ));
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        $model = $this->getEntityUserTable()->getItem($id);
        return new ViewModel(array(
            'model' => $model,
			'data_entity' => $this->getEntityTable()->fetchAll(),
        ));
    }

    public function saveAction()
    {
		$loginName = $this->getServiceLocator()->get('AuthService')->getIdentity();	
		
        $request = $this->getRequest();
        if ($request->isPost()) {
            $formData = ($request->getPost());
           
            $data= array(
                "idUser"=>$request->getPost("idUser"),
                "idEntity"=>$request->getPost("idEntity"),
				"strLoginId"=>$request->getPost("strLoginId"),
				"strName"=>$request->getPost("strName"),
				"strEmail"=>$request->getPost("strEmail"),
				"strMobileNo"=>$request->getPost("strMobileNo"),
				"strAndroidId"=>$request->getPost("strAndroidId"),
				"striOSId"=>$request->getPost("striOSId"),
				"strPassword"=>$request->getPost("strPassword"),
				"intStatus"=>$request->getPost("intStatus"),
				"strCreateBy"=>$loginName,
				"dtCreateDate"=>$request->getPost("dtCreateDate"),
				"strLastModBy"=>$loginName,
				"dtLastModDate"=>$request->getPost("dtLastModDate")
            );
            
            $this->getEntityUserTable()->saveItem($data);

            return $this->redirect()->toRoute('home/default', array(
                'controller' => 'entity-user'
            ));
        }
    }

    public function deleteAction()
    {
        $id = (int)$this->params('id');
        $this->getEntityUserTable()->deleteItem($id);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }

    public function getEntityUserTable()
    {
        if (!$this->entityUserTable) {
            $sm = $this->getServiceLocator();
            $this->entityUserTable = $sm->get('Application\Model\EntityUserTable');
        }
        return $this->entityUserTable;
    }
	
	public function getEntityTable()
    {
        if (!$this->entityTable) {
            $sm = $this->getServiceLocator();
            $this->entityTable = $sm->get('Application\Model\EntityTable');
        }
        return $this->entityTable;
    }
}