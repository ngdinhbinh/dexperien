<?php

namespace Application\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;

class LeadTable extends AbstractTableGateway implements ServiceLocatorAwareInterface
{
    protected $table = 'tbllead';
    protected $services;

    const KEYALL = 'tbllead_all'; //
    const KEYID = 'tbllead_detail_%s'; // %s: id

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
	public function getData($idLead)
    {
		$resultSet = $this->select(array("idLead" => $idLead));
        $resultSet = $resultSet->toArray();
        return $resultSet;
    }
	
    public function getItem($id)
    {
        $id  = (int) $id;
            $rowset = $this->select(array('idLead' => $id));
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
        $idLead = (int)$data["idLead"];
        if ($idLead == 0) {
            $this->insert($data);
            if($cache->getTags(self::KEYALL))
                $cache->clearByTags($cache->getTags(self::KEYALL));
            $this->fetchAll();
        } else {
            if ($this->getItem($idLead)) {
                $this->update($data, array('idLead' => $idLead));

                $key = $this->getKeyID($idLead);
                $cache->removeItem($key);
                $this->getItem($idLead);

                if($cache->getTags(self::KEYALL))
                    $cache->clearByTags($cache->getTags(self::KEYALL));
                $this->fetchAll();
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteItem($idLead)
    {
        $this->delete(array('idLead' => $idLead));
        $this->fetchAll();
    }
}
