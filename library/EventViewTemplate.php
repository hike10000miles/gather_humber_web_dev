<?php
class EventViewTemplate
{
    private $eventModel;
    public function __construct($eventModel)
    {
        $this->eventModel = $eventModel;
    }

    public function displayEventDetailsIndex($link="views/Event/")
    {
        return "<div>
                    <h2><a href='". $link. "event.php" ."?id=". $this->eventModel->getEventId() ."'>". $this->eventModel->getName() ."</a></h2>
                    <p>". $this->eventModel->getStartDate() ."</p>
                    <p>".$this->eventModel->getBusinessName()."</p>
                    <p>". $this->eventModel->getStreetName() . " ". $this->eventModel->getProvince() . " ". $this->eventModel->getCountry(). "</p>
                    <p>Edit</p>
                    <p><a>Delete</a></p>
                </div>";
    }

    public function displayEventDetails($link="event.php")
    {
        return "<div>
                <h2>". $this->eventModel->getName() ."</h2>
                <p>". $this->eventModel->getStartDate() ."</p>
                <p>". $this->eventModel->getBusinessName() ."</p>
                <p>". $this->eventModel->getStreetName() . " ". $this->eventModel->getProvince() . " ". $this->eventModel->getCountry(). "</p>
                <p>".$this->eventModel->getDescription()."</p>
            </p>";
    }

}
?>