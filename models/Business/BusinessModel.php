<?php
class BusinessModel
{
    private $_locationId;
    private $_description;
    private $_id;
    private $_name;
    private $_quota;

    public function __construct($queryResult)
    {
        $this->_addressId = $queryResult["locationId"];
        $this->_description = $queryResult["description"];
        $this->_id = $queryResult["id"];
        $this->_name = $queryResult["name"];
        $this->_quota = $queryResult["quota"];
    }

    public function getLocationId() 
    {
        return $this->_LocationId;
    }

    public function getDescription()
    {
        return $this->_description;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getQuota()
    {
        return $this->quota;
    }
}
?>