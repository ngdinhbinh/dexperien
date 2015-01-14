<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\EntityUserAccessTable;


class LeadConversionRuleController extends AbstractActionController
{
	protected $leadconversionruleTable;
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
			$data = $this->getLeadConversionRuleTable()->fetchAll();
		elseif($chkUsertype == 1)	//Entity Admin
			$data = $this->getLeadConversionRuleTable()->getData($userInfo["idEntity"]);
		elseif($chkUsertype == 2)	//Entity
			$data = $this->getLeadConversionRuleTable()->getData($userInfo["idEntity"]);
			
		//check access right
		$idUser = (int)$userInfo["idUser"];
		$strModuleUrl = 'lead-conversion-rule';
		$arr = $this->getEntityUserAccessTable()->chkAccessright($idUser,$strModuleUrl);
		
        return new ViewModel(array(
            'data' => $data,
			'accessRight' => $arr
        ));
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        $model = $this->getLeadConversionRuleTable()->getItem($id);
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
            $data= array(
                "idConversionRule"=>$request->getPost("idConversionRule"),
				"idEntity"=>$request->getPost("idEntity"),
				"strConversionRuleName"=>$request->getPost("strConversionRuleName"),
                "intType"=>$request->getPost("intType"),
				"strCampaignCode"=>$request->getPost("strCampaignCode"),
				"intEmailConsent"=>$request->getPost("intEmailConsent"),
				"intEmailStatus"=>$request->getPost("intEmailStatus"),
				"EmailSMSOperator"=>$request->getPost("EmailSMSOperator"),
				"intSMSConsent"=>$request->getPost("intSMSConsent"),
				"intSMSStatus"=>$request->getPost("intSMSStatus"),
				"intStatus"=>$request->getPost("intStatus"),
				"strCreateBy"=>$loginName,
				"dtCreateDate"=>date('Y-m-d H:i:s'),
				"strLastModBy"=>$loginName,
				"dtLastModDate"=>date('Y-m-d H:i:s')
            );
            
            $this->getLeadConversionRuleTable()->saveItem($data);

            return $this->redirect()->toRoute('home/default', array(
                'controller' => 'lead-conversion-rule'
            ));
        }
    }

    public function deleteAction()
    {
        $id = (int)$this->params('id');
        $this->getLeadConversionRuleTable()->deleteItem($id);
        $view = new ViewModel();
        $view->setTerminal(true);
        return $view;
    }

    public function getLeadConversionRuleTable()
    {
        if (!$this->leadconversionruleTable) {
            $sm = $this->getServiceLocator();
            $this->leadconversionruleTable = $sm->get('Application\Model\LeadConversionRuleTable');
        }
        return $this->leadconversionruleTable;
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