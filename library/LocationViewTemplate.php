<?php
class LocationViewTemplate
{
    private $_locationModel;
    public function __construct($locationModel)
    {
        $this->_locationModel = $locationModel;
    }

    public function displayLocationDetails($link="views/Location/")
    {
        return "<div>
                    <p>". $this->_locationModel->getStreetName() ."</p>
                    <p>".$this->_locationModel->getPostalCode()."</p>
                    <p>". $this->_locationModel->getCity() . " ". $this->_locationModel->getProvince() . " ". $this->_locationModel->getCountry(). "</p>
                    <p><a href='".$link."editLocation.php?id=".$this->_locationModel->getLocationId()."'>Edit</a></p>
                    <p><a href='".$link."delete.php?id=".$this->_locationModel->getLocationId()."'>Delete</a></p>
                </div>";
    }

    public function displayLocationEditForm()
    {
        return "<form action='editLocation.php' method='POST' >
                <input type='text' name='Id' value='".$this->_locationModel->getLocationId()."' hidden />
                <div>
                    <label for='StreetName'>Street Name:</label>
                    <input type='text' name='StreetName' value='".$this->_locationModel->getStreetName()."' />
                </div>
                <div>
                    <label for='PostalCode'>Postal Code:</label>
                    <input type='text' name='PostalCode' value='".$this->_locationModel->getPostalCode()."' />
                </div>
                <div>
                    <label for='City'>City:</label>
                    <input type='text' name='City' value='".$this->_locationModel->getCity()."' />
                </div>
                <div>
                    <label for='Province'>Province:</label>
                    <input type='text' name='Province' value='".$this->_locationModel->getProvince()."' />
                </div>
                <div>
                    <label for='Country'>Country:</label>
                    <input type='text' name='Country' value='".$this->_locationModel->getCountry()."' />
                </div>
                <div>
                    <input type='submit' value='submit' />
                </div>
            </form>";
    }

    public function displayLocationDelete($link="delete.php")
    {
        return "<div>
                    <p>". $this->_locationModel->getStreetName() ."</p>
                    <p>".$this->_locationModel->getPostalCode()."</p>
                    <p>". $this->_locationModel->getCity() . " ". $this->_locationModel->getProvince() . " ". $this->_locationModel->getCountry(). "</p>
                    <form action='".$link."' method='post'>
                        <input type='hidden' name='id' value='".$this->_locationModel->getLocationId()."'>
                        <input type='submit'value='Delete'>
                    </form>
                </div>";
    }
}
?>