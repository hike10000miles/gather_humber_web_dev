<?php
    if(!defined("__root")) {
        require( $_SERVER['DOCUMENT_ROOT']. "\gather_tryout_1\\configer.php");
    }
    include __root . "models\Event\EventModel.php";

    class EventConnect
    {
        private $_db;

        public function __construct($dbConnection)
        {
            $this->_db = $dbConnection;
        }
        public function getEvents()
        {
            $allEvents = array();
            $sqlQuery = "SELECT e.*, l.*, b.name BusinessName FROM events e JOIN location l ON e.LocationId = l.Id JOIN business b ON b.LocationId = l.Id;";
            //$sqlQuery = "SELECT e.*, l.* FROM events e JOIN location l ON e.LocationId = l.Id;";
            $pdostmt = $this->_db->prepare($sqlQuery);
            $pdostmt -> execute();
            $results = $pdostmt -> fetchAll();
            foreach($results as $result)
            {
                $event = new EventModel($result);
                array_push($allEvents, $event);
            }
            return $allEvents;
        }
        public function createEvent($eventModel)
        {
            $query = "INSERT INTO events
                        (Name, StartDate, LocationId, Duration, Description, UsersId)
                        VALUES(:name, :startDate, :locationId, :duration, :description, :userId);";
            $pdostmt = $this->_db->prepare($query);
            $pdostmt->bindValue(':name', $eventModel->getName(), PDO::PARAM_STR);
            $pdostmt->bindValue(':startDate', $eventModel->getStartDate(), PDO::PARAM_STR);
            $pdostmt->bindValue(':locationId', $eventModel->getLocationId(), PDO::PARAM_STR);
            $pdostmt->bindValue(':duration', $eventModel->getDuration(), PDO::PARAM_STR);
            $pdostmt->bindValue(':description', $eventModel->getDescription(), PDO::PARAM_STR);
            $pdostmt->bindValue(':userId', $eventModel->getUserId(), PDO::PARAM_STR);
            $result = $pdostmt->execute();
            return $result;
        }
        public function getEvent($id) {
            $sqlQuery = "SELECT e.*, l.*, b.name as BusinessName FROM events e JOIN location L ON e.LocationId = l.Id JOIN business b ON b.LocationId = l.Id WHERE e.Id = :id;";
            $pdostmt = $this->_db->prepare($sqlQuery);
            $pdostmt->bindValue(":id", $id, PDO::PARAM_STR);
            $pdostmt -> execute();
            $result = $pdostmt -> fetch();
            $event = new EventModel($result);
            return $event;
        }
                
        public function deleteEvent($eventModel)
        {
            $query = "DELETE FROM events
                      WHERE Id = :id;";
            $pdostmt = $this->_db->prepare($query);
            $pdostmt-> bindValue(':id', $eventModel->getEventId());
            $result = $pdostmt-> execute();
            return $result;
        }
    }
?>