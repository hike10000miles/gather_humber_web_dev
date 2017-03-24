<!DOCTYPE html>
<html>
<head>
    <title>Event Index | Gather</title>
</head>
<body>
    <?php
        if(!defined("__root")) {
            require( $_SERVER['DOCUMENT_ROOT']. "\gather_tryout_1\\configer.php");
        }
        include __root . "views\components\header.php";
        include __root . "DBConnect/connect.php";
        include __root . "controlers/EventControler/EventConnect.php";
        include __root . "library/EventViewTemplate.php";
        include __root . "library/LocationViewTemplate.php";
        include __root . "controlers/LocationControler/LocationConnect.php";
        
        $db = Connect::dbConnect();
        $eventConnect = new EventConnect($db);
        $locationConnect = new LocationConnect($db);
        $allEvents = $eventConnect->getEvents();
        $allEventsTemplates = array();
        $allLocationsTemplates = array();
        $allLocations = $locationConnect->getLocations();

        foreach($allEvents as $event)
        {
            $template = new EventViewTemplate($event);
            array_push($allEventsTemplates, $template);
        }

        foreach($allLocations as $location)
        {
            $template = new LocationViewTemplate($location);
            array_push($allLocationsTemplates, $template);
        }
    ?>
    <!--List of all events-->
    <section>
        <?php
        
            foreach ($allEventsTemplates as $template) {
                echo $template->displayEventDetailsIndex();
            }

            foreach ($allLocationsTemplates as $template) {
                echo $template->displayLocationDetails();
            }

        ?>
    </section>
</body>
</html>