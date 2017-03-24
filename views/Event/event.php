<?php
    if(!defined("__root")) {
        require( $_SERVER['DOCUMENT_ROOT']. "\gather_tryout_1\\configer.php");
    }
    include __root . "DBConnect/connect.php";
    include __root . "controlers/EventControler/EventConnect.php";
    include __root . "library/EventViewTemplate.php";

    $eventConnect = new EventConnect(Connect::dbconnect());
    $event = null;

    if(isset($_GET["id"])) {
        $event = $eventConnect->getEvent($_GET["id"]); 
        $eventTemplate = new EventViewTemplate($event);
    } else {
        echo "not set";
    }

    echo $eventTemplate->displayEventDetails();

?>
