<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class ModuleController extends AbstractActionController
{
	protected $moduleTable;
	
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
            'data' => $this->getModuleTable()->fetchAll(),
			'data_module_root' => $this->getModuleTable()->selectRootModuleAll(),
			'this_controller' => $this,
        ));
    }
	public function getChildModuleAction($intParentModule){
		$arr = $this->getModuleTable()->selectChildModuleAll($intParentModule);
		return $arr;
	}
    public function editAction()
    {
        $id = (int)$this->params('id');
        $model = $this->getModuleTable()->getItem($id);
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
			
			$access = $request->getPost("access");	
			$access = json_decode($access);		
			foreach($access as $key=>$val){ 
				$idModule = $key;
				$intActive = $val;
				
				$data= array(
					"idModule"=>$idModule,
					"intActive"=>$intActive
				);
				
				 $this->getModuleTable()->saveItem($data);
			}

            return $this->redirect()->toRoute('home/default', array(
                'controller' => 'module'
            ));
        }
    }

    public function deleteAction()
    {
        $id = (int)$this->params('id');
        $this->getModuleTable()->deleteItem($id);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }

    public function getModuleTable()
    {
        if (!$this->moduleTable) {
            $sm = $this->getServiceLocator();
            $this->moduleTable = $sm->get('Application\Model\ModuleTable');
        }
        return $this->moduleTable;
    }
}