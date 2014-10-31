<?php

namespace Application\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class UserProfile implements InputFilterAwareInterface
{
    public $idUser;
    public $strUserId;
    public $strPassword;
    public $strName;
    public $strDepartment;
    public $strEmail;
    public $intPhoneNumber;
    public $intMobileNumber;
    public $dtLastLogin;
    public $strLastLoginIP;
    public $intLoginFailed;
    public $dtLastLoginFailed;
    public $strLastLoginFailedIP;
    public $intStatus;
    public $strCreatedBy;
    public $dtCreatedDate;
    public $strLastModBy;
    public $dtLastModDate;
    public $idUserType;
    public $strPicture;

    protected $inputFilter;

    /**
     * Used by ResultSet to pass each database row to the entity
     */
    public function exchangeArray($data)
    {
        $this->idUser     = (isset($data['idUser'])) ? $data['idUser'] : null;
        $this->strUserId = (isset($data['strUserId'])) ? $data['strUserId'] : null;
        $this->strPassword  = (isset($data['strPassword'])) ? $data['strPassword'] : null;
        $this->strName  = (isset($data['strName'])) ? $data['strName'] : null;
        $this->strDepartment  = (isset($data['strDepartment'])) ? $data['strDepartment'] : null;
        $this->strEmail  = (isset($data['strEmail'])) ? $data['strEmail'] : null;
        $this->intPhoneNumber  = (isset($data['intPhoneNumber'])) ? $data['intPhoneNumber'] : null;
        $this->intMobileNumber  = (isset($data['intMobileNumber'])) ? $data['intMobileNumber'] : null;
        $this->dtLastLogin  = (isset($data['dtLastLogin'])) ? $data['dtLastLogin'] : null;
        $this->strLastLoginIP  = (isset($data['strLastLoginIP'])) ? $data['strLastLoginIP'] : null;
        $this->intLoginFailed  = (isset($data['intLoginFailed'])) ? $data['intLoginFailed'] : null;
        $this->dtLastLoginFailed  = (isset($data['dtLastLoginFailed'])) ? $data['dtLastLoginFailed'] : null;
        $this->strLastLoginFailedIP  = (isset($data['strLastLoginFailedIP'])) ? $data['strLastLoginFailedIP'] : null;
        $this->intStatus  = (isset($data['intStatus'])) ? $data['intStatus'] : null;
        $this->strCreatedBy  = (isset($data['strCreatedBy'])) ? $data['strCreatedBy'] : null;
        $this->dtCreatedDate  = (isset($data['dtCreatedDate'])) ? $data['dtCreatedDate'] : null;
        $this->strLastModBy  = (isset($data['strLastModBy'])) ? $data['strLastModBy'] : null;
        $this->dtLastModDate  = (isset($data['dtLastModDate'])) ? $data['dtLastModDate'] : null;
        $this->idUserType  = (isset($data['idUserType'])) ? $data['idUserType'] : null;
        $this->strPicture  = (isset($data['strPicture'])) ? $data['strPicture'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'idUser',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'strName',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}
