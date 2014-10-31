<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use MyZend\Model\Test;
use Application\Model\UserProfile;

class UserProfileController extends AbstractActionController
{
	protected $userprofileTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'data' => $this->getUserProfileTable()->fetchAll(),
        ));

    }

    public function editAction()
    {
        
    }

    public function saveAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {

            return $this->redirect()->toRoute('home/default', array(
                'controller' => 'user-profile'
            ));
        }
    }

    public function deleteAction()
    {
        
    }

    public function getUserProfileTable()
    {
        if (!$this->userprofileTable) {
            $sm = $this->getServiceLocator();
            $this->userprofileTable = $sm->get('Application\Model\UserProfileTable');
        }
        return $this->userprofileTable;
    }
}