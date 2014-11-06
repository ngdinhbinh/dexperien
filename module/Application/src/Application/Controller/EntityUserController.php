<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\EntityTable;
use Application\Model\ModuleTable;
use Application\Model\EntityUserAccessTable;


class EntityUserController extends AbstractActionController
{
	protected $entityUserTable;
	protected $entityTable;
	protected $moduleTable;
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
			'data_module_root' => $this->getModuleTable()->selectRootModule(),
			'this_controller' => $this
        ));
    }
	
	
	public function getChildModuleAction($intParentModule){
		$arr = $this->getModuleTable()->selectChildModule($intParentModule);
		return $arr;
	}
	public function getUserPermission($idUser,$idModule){
		$arr = $this->getEntityUserAccessTable()->selectUserModule($idUser,$idModule);
		return $arr;
	}

    public function saveAction()
    {
		$loginName = $this->getServiceLocator()->get('AuthService')->getIdentity();	
        $request = $this->getRequest();
		
        if ($request->isPost()) {
			
            $formData = ($request->getPost());           
            $data= array(
                "idUser" => $request->getPost("idUser"),
                "idEntity"=>$request->getPost("idEntity"),
				"strLoginId"=>$request->getPost("strLoginId"),
				"strName"=>$request->getPost("strName"),
				"strEmail"=>$request->getPost("strEmail"),
				"strMobileNo"=>$request->getPost("strMobileNo"),
				"strAndroidId"=>$request->getPost("strAndroidId"),
				"striOSId"=>$request->getPost("striOSId"),				
				"intStatus"=>$request->getPost("intStatus"),
				"strCreateBy"=>$loginName,
				"dtCreateDate"=>$request->getPost("dtCreateDate"),
				"strLastModBy"=>$loginName,
				"dtLastModDate"=>$request->getPost("dtLastModDate")
            );
			$password = $request->getPost("strPassword");
			if(count(trim($password))> 0)
				$data["strPassword"] = md5($password);
            
            $id = $this->getEntityUserTable()->saveItem($data);
			
			//Set accessRight
			$idUser = $request->getPost("idUser");	
			$access = $request->getPost("access");	
			$access = json_decode($access);			
			if((int)$idUser == 0)
				$idUser = $id;
			$this->getEntityUserAccessTable()->deleteAll($idUser);			
			foreach($access as $key=>$val){ 
				$idModule = substr( $key, 7); 
				$intDelete = 0;
				$intAdd = 0;
				$intEdit = 0;
				$intView = 0;				
				$intDelete = $val->del;
				$intAdd = $val->add;
				$intEdit = $val->edit;
				$intView = $val->view;
				$dataAccess = array("idUserAccess" => 0,
									"idUser" => $idUser,
									"idModule" => $idModule,
									"intAccess" => 1,
									"strLastModBy" => $loginName,
									"dtLastModDate" => date('Y-m-d H:i:s'),
									"intView" => $intView,
									"intAdd" => $intEdit ,
									"intDelete" => $intDelete,
									"intEdit" => 	$intEdit						
									);		
				$this->getEntityUserAccessTable()->saveItem($dataAccess);
			}			
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
	public function getModuleTable()
    {
        if (!$this->moduleTable) {
            $sm = $this->getServiceLocator();
            $this->moduleTable = $sm->get('Application\Model\ModuleTable');
        }
        return $this->moduleTable;
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