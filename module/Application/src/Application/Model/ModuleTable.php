<?php

namespace Application\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;

class ModuleTable extends AbstractTableGateway implements ServiceLocatorAwareInterface
{
    protected $table = 'tblmodule';
    protected $services;

    const KEYALL = 'tblmodule_all'; //
    const KEYID = 'tblmodule_detail_%s'; // %s: id

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->initialize();
    }

    public function getKeyAll() {
        return sprintf(self::KEYALL);
    }
    public function getKeyID($id) {
        return sprintf(self::KEYID, $id);
    }

    public function setServiceLocator(ServiceLocatorInterface $locator)
    {
        $this->services = $locator;
    }

    public function getServiceLocator()
    {
        return $this->services;
    }

    public function fetchAll()
    {      
		$resultSet = $this->select(function (Select $select){
		$select->columns(array('idModule', 'strModuleName', 'strModuleUrl','intModuleParent','intSort','intActive')); 			
			$select->order('intSort ASC'); 
		});       
        return $resultSet;
		

    }
	public function selectRootModule()
    {      
		$resultSet = $this->select(function (Select $select){
			$select->columns(array('idModule', 'strModuleName', 'strModuleUrl','intModuleParent','intSort')); 	
			$select->where("intModuleParent is NULL and intActive = 1"); 				
			$select->order('intSort ASC'); 
		});       
        return $resultSet;
    }
	public function selectRootModuleAll()
    {      
		$resultSet = $this->select(function (Select $select){
			$select->columns(array('idModule', 'strModuleName', 'strModuleUrl','intModuleParent','intSort')); 	
			$select->where("intModuleParent is NULL"); 				
			$select->order('intSort ASC'); 
		});       
        return $resultSet;
    }
	public function selectChildModuleAll($id)
    {      
		$id  = (int) $id;		
		$resultSet = $this->select(array('intModuleParent' => $id));       
        return $resultSet;
    }
	public function selectChildModule($id)
    {      
		$id  = (int) $id;		
		$resultSet = $this->select(array('intModuleParent' => $id, "intActive" => 1));       
        return $resultSet;
    }
	
    public function getItem($id)
    {
        $id  = (int) $id;
		$rowset = $this->select(array('idModule' => $id));
            $row = $rowset->current();
            if (!$row) {
                $row = array();
            }
        return $row;
    }

    public function saveItem($data)
    {
        $cache = $this->getServiceLocator()->get('cache');
        $idModule = (int)$data["idModule"];
        if ($idModule == 0) {
            $this->insert($data);
            if($cache->getTags(self::KEYALL))
                $cache->clearByTags($cache->getTags(self::KEYALL));
            $this->fetchAll();
        } else {
            if ($this->getItem($idModule)) {
                $this->update($data, array('idModule' => $idModule));

                $key = $this->getKeyID($idModule);
                $cache->removeItem($key);
                $this->getItem($idModule);

                if($cache->getTags(self::KEYALL))
                    $cache->clearByTags($cache->getTags(self::KEYALL));
                $this->fetchAll();
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteItem($id)
    {
        $cache = $this->getServiceLocator()->get('cache');
        $this->delete(array('idModule' => $id));
        //Cache
        $key = $this->getKeyID($id);
        $cache->removeItem($key);
        if($cache->getTags(self::KEYALL))
            $cache->clearByTags($cache->getTags(self::KEYALL));
        $this->fetchAll();
    }
}
