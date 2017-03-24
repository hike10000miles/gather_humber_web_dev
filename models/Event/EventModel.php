<?php
class EventModel
{
    private $_eventId;
    private $_name;
    private $_description;
    private $_startDate;
    private $_duration;
    private $_locationId;
    private $_businessName;
    private $_streetName;
    private $_postalCode;
    private $_city;
    private $_province;
    private $_country;
    private $_userId;

    public function __construct($queryResult)
    {   
        if(isset($queryResult['Id']) && isset($queryResult['BusinessName']) && isset($queryResult['StreetName'])) {
            $this->_eventId = $queryResult["Id"];            
            $this->_businessName = $queryResult["BusinessName"];
            $this->_streetName = $queryResult["StreetName"];
            $this->_postalCode = $queryResult["PostalCode"];
            $this->_city = $queryResult["City"];
            $this->_province = $queryResult["Province"];
            $this->_country = $queryResult["Country"];
        }
        if(isset($queryResult['UsersId'])) {
            $this->_userId = $queryResult['UsersId'];
        }
        $this->_name = $queryResult["Name"];
        $this->_description = $queryResult["Description"];
        $this->_startDate = $queryResult["StartDate"];
        $this->_duration = $queryResult["Duration"];
        $this->_locationId = $queryResult["LocationId"];
    }

    public function getEventId()
    {
        return $this->_eventId;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setName($value)
    {
        $this->_name = $value;
    }

    public function getDescription()
    {
        return $this->_description;
    }

    public function setDescription($value)
    {
        $this->_description = $value;
    }

    public function getStartDate()
    {
        return $this->_startDate;
    }

    public function setStartDate($value)
    {
        $this->_startDate = $value;
    }

    public function getDuration()
    {
        return $this->_duration;
    }

    public function setDuration($value)
    {
        $this->_duration = $value;
    }

    public function getStreetName()
    {
        return $this->_streetName;
    }

    public function getPostalCode()
    {
        return $this->_postalCode;
    }

    public function getCity()
    {
        return $this->_city;
    }

    public function getProvince()
    {
        return $this->_province;
    }

    public function getCountry()
    {
        return $this->_country;
    }

    public function getBusinessName()
    {
        return $this->_businessName;
    }

    public function getLocationId()
    {
        return $this->_locationId;
    }

    public function getUserId()
    {
        return $this->_userId;
    }
}
?>