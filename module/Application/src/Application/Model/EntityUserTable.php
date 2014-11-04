<?php

namespace Application\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;

class EntityUserTable extends AbstractTableGateway implements ServiceLocatorAwareInterface
{
    protected $table = 'tblentityuser';
    protected $services;

    const KEYALL = 'tblentityuser_all'; //
    const KEYID = 'tblentityuser_detail_%s'; // %s: id

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
	
	
    public function getItem($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('idUser' => $id));
        $row = $rowset->current();
        if (!$row) {
            $row = array();
		}
        return $row;
    }

    public function saveItem($data)
    {
        $cache = $this->getServiceLocator()->get('cache');
        $idUser = (int)$data["idUser"];
        if ($idUser == 0) {
            $this->insert($data);
            if($cache->getTags(self::KEYALL))
                $cache->clearByTags($cache->getTags(self::KEYALL));
            $this->fetchAll();
        } else {
            if ($this->getItem($idUser)) {
                $this->update($data, array('idUser' => $idUser));

                $key = $this->getKeyID($idUser);
                $cache->removeItem($key);
                $this->getItem($idUser);

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
        $this->delete(array('idUser' => $id));
        //Cache
        $key = $this->getKeyID($id);
        $cache->removeItem($key);
        if($cache->getTags(self::KEYALL))
            $cache->clearByTags($cache->getTags(self::KEYALL));
        $this->fetchAll();
    }
}
