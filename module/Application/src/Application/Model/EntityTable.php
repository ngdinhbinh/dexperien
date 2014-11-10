<?php

namespace Application\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;

class EntityTable extends AbstractTableGateway implements ServiceLocatorAwareInterface
{
    protected $table = 'tblentity';
    protected $services;

    const KEYALL = 'tblentity_all'; //
    const KEYID = 'tblentity_detail_%s'; // %s: id

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
	public function getData($idEntity )
    {
		$resultSet = $this->select(array("idEntity" => $idEntity));
        $resultSet = $resultSet->toArray();
        return $resultSet;
    }
	
    public function getItem($id)
    {
        $id  = (int) $id;
            $rowset = $this->select(array('idEntity' => $id));
            $row = $rowset->current();
            if (!$row) {
                $row = array();
            }
           // $cache->setItem($key, $row);
        //}
        return $row;
    }

    public function saveItem($data)
    {
        $cache = $this->getServiceLocator()->get('cache');
        $idEntity = (int)$data["idEntity"];
        if ($idEntity == 0) {
            $this->insert($data);
            if($cache->getTags(self::KEYALL))
                $cache->clearByTags($cache->getTags(self::KEYALL));
            $this->fetchAll();
        } else {
            if ($this->getItem($idEntity)) {
                $this->update($data, array('idEntity' => $idEntity));

                $key = $this->getKeyID($idEntity);
                $cache->removeItem($key);
                $this->getItem($idEntity);

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
        $this->delete(array('idEntity' => $id));
        //Cache
        $key = $this->getKeyID($id);
        $cache->removeItem($key);
        if($cache->getTags(self::KEYALL))
            $cache->clearByTags($cache->getTags(self::KEYALL));
        $this->fetchAll();
    }
}
