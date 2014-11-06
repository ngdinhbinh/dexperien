<?php

namespace Application\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;

class EntityUserAccessTable extends AbstractTableGateway implements ServiceLocatorAwareInterface
{
    protected $table = 'tblentityuseraccess';
    protected $services;

    const KEYALL = 'tblentityuseraccess_all'; //
    const KEYID = 'tblentityuseraccess_detail_%s'; // %s: id

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
        $resultSet = $this->select();
        $resultSet =$resultSet->toArray();
            
        return $resultSet;
    }
	
	public function getItemBystrLoginId($strLoginId)
    {
		$sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from(array('f' => 'tblentityuseraccess'))->join(array('b' => 'tblmodule'), 'f.idModule = b.idModule')->join(array('c' => 'tblentityuser'), 'c.idUser = f.idUser');		
		$select->where(array('strLoginId' => $strLoginId));
		
		$resultSet = $this->selectWith($select);
		$result = $resultSet->toArray();		
		return $result;
    }
	public function selectUserModule($idUser, $idModule)
    {   	
		$resultSet = $this->select(array('idUser' => $idUser, 'idModule' => $idModule));       
        return $resultSet;
    }
	public function chkAccessright($idUser, $strModuleUrl)
    {   	
		$sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->from(array('f' => 'tblentityuseraccess'))->join(array('b' => 'tblmodule'), 'f.idModule = b.idModule')->join(array('c' => 'tblentityuser'), 'c.idUser = f.idUser');		
		$select->where(array('c.idUser' => $idUser, "strModuleUrl" => $strModuleUrl));	
		
		$resultSet = $this->selectWith($select);
		
		$result = $resultSet->toArray();		
		return $result;
    }
    public function getItem($id)
    {
        $id  = (int) $id;
        $cache = $this->getServiceLocator()->get('cache');
        // set unique Cache key
        $key = $this->getKeyID($id);
        // get the Cache data

        $row = $cache->getItem($key, $success);
        if (!$success) {
            $rowset = $this->select(array('idUserAccess' => $id));
            $row = $rowset->current();
            if (!$row) {
                $row = array();
            }
            $cache->setItem($key, $row);
        }
        return $row;
    }

    public function saveItem($data)
    {
        $idUserAccess = (int)$data["idUserAccess"];
        if ($idUserAccess == 0) {
            $this->insert($data);           
            $this->fetchAll();
        } else {
            if ($this->getItem($idUserAccess)) {
                $this->update($data, array('idUserAccess' => $idUserAccess));
                $this->fetchAll();
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteItem($id)
    {
        $cache = $this->getServiceLocator()->get('cache');
        $this->delete(array('idUserAccess' => $id));
        //Cache
        $key = $this->getKeyID($id);
        $cache->removeItem($key);
        if($cache->getTags(self::KEYALL))
            $cache->clearByTags($cache->getTags(self::KEYALL));
        $this->fetchAll();
    }
	public function deleteAll($idUser, $idModule)
    {
        $this->delete(array('idUser' => $idUser, 'idModule' => $idModule ));
             
        $this->fetchAll();
    }
}
