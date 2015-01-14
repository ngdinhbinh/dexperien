<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\EntityUserAccessTable;


class LeadController extends AbstractActionController
{
	protected $leadTable;
	protected $entityUserTable;
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
		
		//check userInfo
		$loginName = $this->getServiceLocator()->get('AuthService')->getIdentity();	
		$userInfo = $this->getEntityUserTable()->getItembyLoginId($loginName);
		
		$chkUsertype = (int)$_SESSION['intUserType'] ; 
		
		if($chkUsertype == 0) //Supper Admin
			$data = $this->getLeadTable()->fetchAll();
		elseif($chkUsertype == 1)	//Entity Admin
			$data = $this->getLeadTable()->getData($userInfo["idEntity"]);
		elseif($chkUsertype == 2)	//Entity
			$data = $this->getLeadTable()->getData($userInfo["idEntity"]);
			
		//check access right
		$idUser = (int)$userInfo["idUser"];
		$strModuleUrl = 'lead';
		$arr = $this->getEntityUserAccessTable()->chkAccessright($idUser,$strModuleUrl);
		
        return new ViewModel(array(
            'data' => $data,
			'accessRight' => $arr
        ));
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        $model = $this->getLeadTable()->getItem($id);
        return new ViewModel(array(
            'model' => $model,
        ));
    }

    public function saveAction()
    {
		date_default_timezone_set('UTC');
		$loginName = $this->getServiceLocator()->get('AuthService')->getIdentity();	
		
        $request = $this->getRequest();
        if ($request->isPost()) {
            $formData = ($request->getPost());
           
			$intEmailConsent = $request->getPost("intEmailConsent");
			if(isset($intEmailConsent)) $intEmailConsent = 1; else $intEmailConsent = 0;
			
			$intMobileConsent = $request->getPost("intMobileConsent");
			if(isset($intMobileConsent)) $intMobileConsent = 1; else $intMobileConsent = 0;
			
            $data= array(
                "idLead"=>$request->getPost("idLead"),
                "idEntity"=>$request->getPost("idEntity"),
				"strIdNo"=>$request->getPost("strIdNo"),
				"strFirstName"=>$request->getPost("strFirstName"),
				"strLastName"=>$request->getPost("strLastName"),
				"strEmail"=>$request->getPost("strEmail"),
				"strMobileNo"=>$request->getPost("strMobileNo"),
				"intEmailConsent"=>$intEmailConsent,
				"intMobileConsent"=>$intMobileConsent,
				"intEmailStatus"=>$request->getPost("intEmailStatus"),
				"intSMSStatus"=>$request->getPost("intSMSStatus"),
				"intSource"=>$request->getPost("intSource"),
				"strCampaignCode"=>$request->getPost("strCampaignCode"),
				"strAffilliateCode"=>$request->getPost("strAffilliateCode"),
				"intStatus"=>$request->getPost("intStatus"),
				"strCreateBy"=>$loginName,
				"dtCreateDate"=>date('Y-m-d H:i:s'),
				"strLastModBy"=>$loginName,
				"dtLastModDate"=>date('Y-m-d H:i:s')
            );
            
            $this->getLeadTable()->saveItem($data);

            return $this->redirect()->toRoute('home/default', array(
                'controller' => 'lead'
            ));
        }
    }

    public function deleteAction()
    {
        $id = (int)$this->params('id');
        $this->getLeadTable()->deleteItem($id);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }

    public function getLeadTable()
    {
        if (!$this->leadTable) {
            $sm = $this->getServiceLocator();
            $this->leadTable = $sm->get('Application\Model\LeadTable');
        }
        return $this->leadTable;
    }
	 public function getEntityUserTable()
    {
        if (!$this->entityUserTable) {
            $sm = $this->getServiceLocator();
            $this->entityUserTable = $sm->get('Application\Model\EntityUserTable');
        }
        return $this->entityUserTable;
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