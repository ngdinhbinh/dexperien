<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class UserTypeController extends AbstractActionController
{
	protected $userTypeTable;
	
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
            'data' => $this->getUserTypeTable()->fetchAll(),
        ));
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        $model = $this->getUserTypeTable()->getItem($id);
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
            $idUserType = $request->getPost("idUserType");
            $data= array(
                "idUserType"=>$idUserType,
                "strUserTypeName"=>$request->getPost("strUserTypeName")
            );

            if($idUserType=="0")
            {
                $data['strCreatedBy']="";
                $data['dtCreatedDate']=date('Y-m-d H:i:s');
                $data['strLastModBy']="";
                $data['dtLastModDate']=date('Y-m-d H:i:s');
            }
            else
            {
                $data['strLastModBy']="";
                $data['dtLastModDate']=date('Y-m-d H:i:s');
            }
            $this->getUserTypeTable()->saveItem($data);

            return $this->redirect()->toRoute('home/default', array(
                'controller' => 'user-type'
            ));
        }
    }

    public function deleteAction()
    {
        $id = (int)$this->params('id');
        $this->getUserTypeTable()->deleteItem($id);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }

    public function getUserTypeTable()
    {
        if (!$this->userTypeTable) {
            $sm = $this->getServiceLocator();
            $this->userTypeTable = $sm->get('Application\Model\UserTypeTable');
        }
        return $this->userTypeTable;
    }
}