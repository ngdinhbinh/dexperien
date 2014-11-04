<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class EntityController extends AbstractActionController
{
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
            'data' => $this->getEntityTable()->fetchAll(),
        ));
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        $model = $this->getEntityTable()->getItem($id);
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
           
			$intDXPEmailGateway = $request->getPost("intDXPEmailGateway");
			if(isset($intDXPEmailGateway)) $intDXPEmailGateway = 1; else $intDXPEmailGateway = 0;
			
			$intDXPSMSGateway = $request->getPost("intDXPSMSGateway");
			if(isset($intDXPSMSGateway)) $intDXPSMSGateway = 1; else $intDXPSMSGateway = 0;
            $data= array(
                "idEntity"=>$request->getPost("idEntity"),
                "strName"=>$request->getPost("strName"),
				"strIDNo"=>$request->getPost("strIDNo"),
				"strEmail"=>$request->getPost("strEmail"),
				"strURL"=>$request->getPost("strURL"),
				"strMobileNo"=>$request->getPost("strMobileNo"),
				"strAddress1"=>$request->getPost("strAddress1"),
				"strAddress2"=>$request->getPost("strAddress2"),
				"strAddress3"=>$request->getPost("strAddress3"),
				"strCity"=>$request->getPost("strCity"),
				"strState"=>$request->getPost("strState"),
				"strCountry"=>$request->getPost("strCountry"),
				"strBillingContact"=>$request->getPost("strBillingContact"),
				"strBillingEmail"=>$request->getPost("strBillingEmail"),
				"strTechnicalContact"=>$request->getPost("strTechnicalContact"),
				"strTechnicalEmail"=>$request->getPost("strTechnicalEmail"),
				"intDXPEmailGateway"=>$intDXPEmailGateway,
				"decEmailCost"=>$request->getPost("decEmailCost"),
				"strSMTP"=>$request->getPost("strSMTP"),
				"strEmailUser"=>$request->getPost("strEmailUser"),
				"strEmailPassword"=>$request->getPost("strEmailPassword"),
				"intDXPSMSGateway"=>$intDXPSMSGateway,
				"decSMSCost"=>$request->getPost("decSMSCost"),
				"strGatewayAddress"=>$request->getPost("strGatewayAddress"),
				"strSMSUser"=>$request->getPost("strSMSUser"),
				"strSMSPassword"=>$request->getPost("strSMSPassword"),
				"strAndroidAppId"=>$request->getPost("strAndroidAppId"),
				"striOSAppid"=>$request->getPost("striOSAppid"),
				"strFBUserId"=>$request->getPost("strFBUserId"),
				"strFBTokenId"=>$request->getPost("strFBTokenId"),
				"strTwitterUserId"=>$request->getPost("strTwitterUserId"),
				"strTwitterTokenId"=>$request->getPost("strTwitterTokenId"),
				"strGoogleUserId"=>$request->getPost("strGoogleUserId"),
				"strGoogleTokenId"=>$request->getPost("strGoogleTokenId")
            );
            
            $this->getEntityTable()->saveItem($data);

            return $this->redirect()->toRoute('home/default', array(
                'controller' => 'entity'
            ));
        }
    }

    public function deleteAction()
    {
        $id = (int)$this->params('id');
        $this->getEntityTable()->deleteItem($id);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
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