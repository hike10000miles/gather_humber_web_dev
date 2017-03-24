<!DOCTYPE html>
<html>
    <head>
        <title>Event Create | Gather</title>
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
            if(isset($_POST['UsersId']) && isset($_POST['Name']) && isset($_POST['Duration']) && isset($_POST['StartDate']) 
               && isset($_POST['LocationId']) && isset($_POST['Description'])){
                $event = new EventModel($_POST);
                $eventConnect = new EventConnect($db);
                $result = $eventConnect->createEvent($event);
                if($result) {
                    header("Location: http://localhost/gather_tryout_1");
                    exit;
                } else {
                    echo "<h1>Something went wrong!</h1>";
                }
            }
            
            $locationConnect = new LocationConnect($db);
            $allLocations = $locationConnect->getAllBusinessLocations();
        ?>

        <div>
            <form action="createEvent.php" method="POST">
                <input type="text" value="1" name="UsersId" hidden/>
                <div>
                    <label for="Name">Event Name</label>
                    <input type="text" name="Name" />
                </div>
                <div>
                    <label for="StartDate">Event Start Date</label>
                    <input type="datetime-local" name="StartDate" />
                </div>
                <div>
                    <label for="Duration">Event Duration</label>
                    <input type="number" name="Duration" />
                </div>
                <div>
                    <label for="LocationId">Event Location</label>
                    <select name="LocationId">
                        <?php foreach ($allLocations as $location) {
                            echo "<option value='".$location->getLocationId()."'>".$location->getBusinessName()." ".$location->getStreetName()." ".$location->getCity().", ".$location->getProvince()."</option>";
                        }?>
                    </select>
                </div>
                <div>
                    <label for="Description">Description</label>
                    <textarea name="Description"></textarea>
                </div>
                <div>
                    <input type="submit" value="Submit"/>
                </div>
            </form>
        </div>
    </body>
</html>