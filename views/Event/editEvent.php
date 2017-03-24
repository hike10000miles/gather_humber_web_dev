<!DOCTYPE html>
<html>
    <head>
        <title>Event Edit | Gather</title>
    </head>
    <body>
        <?php
            if(!defined("__root")) {
                require( $_SERVER['DOCUMENT_ROOT']. "\gather_tryout_1\\configer.php");
            }
            include __root."DBConnect/connect.php";
            include __root."controlers/EventControler/EventConnect.php";
            include __root."controlers/LocationControler/LocationConnect.php";
            include __root."views/components/header.php";
            
            $db = Connect::dbConnect();
            $event = null;

            if(isset($_GET["id"])){
                $eventConnect = new EventConnect($db);
                $event = $eventConnect->getEvent($_GET["id"]);
            } else {
                echo "<h1>Not found!</h1>";
            }

            if(isset($_POST['UserId']) && isset($_POST['Name']) && isset($_POST['Duration']) && isset($_POST['StartDate']) 
               && isset($_POST['LocationId']) && isset($_POST['Description'])){
                //$event = new EventModel($_POST);
                //$eventConnect = new EventConnect($db);
                //$result = $eventConnect->createEvent($event);
                //if($result) {
                //    header("Location: http://localhost/gather_tryout_1");
                //    exit;
                //} else {
                //    echo "<h1>Something went wrong!</h1>";
                //}
            }
            
            $locationConnect = new LocationConnect($db);
            $allLocations = $locationConnect->getAllBusinessLocations();
        ?>

        <div>
            <form action="editEvent.php" method="POST">
                <input type="text" value=<?php echo $event->getUserID();?> name="UserId" hidden/>
                <div>
                    <label for="Name">Event Name</label>
                    <input type="text" name="Name"  value=<?php echo $event->getName();?>/>
                </div>
                <div>
                    <label for="StartDate">Event Start Date</label>
                    <input type="datetime-local" name="StartDate" value=<?php echo $event->getStartDate();?>/>
                </div>
                <div>
                    <label for="Duration">Event Duration</label>
                    <input type="number" name="Duration" value=<?php echo $event->getDuration();?>/>
                </div>
                <div>
                    <label for="LocationId">Event Location</label>
                    <select name="LocationId" >
                        <?php foreach ($allLocations as $location) {
                            if($event->getLocationId() == $location->getLocationId()) {
                                echo "<option value='".$location->getLocationId()."' selected='selected'>".$location->getBusinessName()." ".$location->getStreetName()." ".$location->getCity().", ".$location->getProvince()."</option>";
                            } else {
                                echo "<option value='".$location->getLocationId()."'>".$location->getBusinessName()." ".$location->getStreetName()." ".$location->getCity().", ".$location->getProvince()."</option>";
                            }
                        }?>
                    </select>
                </div>
                <div>
                    <label for="Description">Description</label>
                    <textarea name="Description" value=<?php echo $event->getDescription();?>></textarea>
                </div>
                <div>
                    <input type="submit" value="Submit"/>
                </div>
            </form>
        </div>
    </body>
</html>