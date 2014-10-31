<?php

namespace Application\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;

class UserProfileTable extends AbstractTableGateway
{
    protected $table = 'tbluserprofile';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new UserProfile());
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getItem($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('idUser' => $id));
        $row = $rowset->current();
        if (!$row) {
            $row=array();
        }
        return $row;
    }

    public function saveItem($data)
    {
        $idUser = (int)$data["idUser"];
        if ($idUser == 0) {
            $this->insert($data);
        } else {
            if ($this->getItem($idUser)) {
                $this->update($data, array('idUser' => $idUser));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteItem($id)
    {
        $this->delete(array('idUser' => $id));
    }

}
