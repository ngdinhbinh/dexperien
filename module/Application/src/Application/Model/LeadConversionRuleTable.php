<?php

namespace Application\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;

class LeadConversionRuleTable extends AbstractTableGateway implements ServiceLocatorAwareInterface
{
    protected $table = 'tblleadconversionrule';
    protected $services;

    const KEYALL = 'tblleadconversionrule_all'; //
    const KEYID = 'tblleadconversionrule_detail_%s'; // %s: id

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
	public function getData($idConversionRule)
    {
		$resultSet = $this->select(array("idConversionRule" => $idConversionRule));
        $resultSet = $resultSet->toArray();
        return $resultSet;
    }
	
    public function getItem($id)
    {
        $id  = (int) $id;
            $rowset = $this->select(array('idConversionRule' => $id));
            $row = $rowset->current();
            if (!$row) {
                $row = array();
            }
        return $row;
    }

    public function saveItem($data)
    {
        $cache = $this->getServiceLocator()->get('cache');
        $idConversionRule = (int)$data["idConversionRule"];
        if ($idConversionRule == 0) {
            $this->insert($data);
            if($cache->getTags(self::KEYALL))
                $cache->clearByTags($cache->getTags(self::KEYALL));
            $this->fetchAll();
        } else {
            if ($this->getItem($idConversionRule)) {
                $this->update($data, array('idConversionRule' => $idConversionRule));

                $key = $this->getKeyID($idConversionRule);
                $cache->removeItem($key);
                $this->getItem($idConversionRule);

                if($cache->getTags(self::KEYALL))
                    $cache->clearByTags($cache->getTags(self::KEYALL));
                $this->fetchAll();
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteItem($idConversionRule)
    {
        $this->delete(array('idConversionRule' => $idConversionRule));
        $this->fetchAll();
    }
}
