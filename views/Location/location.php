<?php
    if(!defined("__root")) {
        require( $_SERVER['DOCUMENT_ROOT']. "\gather_tryout_1\\configer.php");
    }
    include __root . "DBConnect\connect.php";
    include __root . "controlers\LocationControler\LocationConnect.php";
    include __root . "library\LocationViewTemplate.php";

    $db = Connect::dbConnect();
    $locationConnect = new LocationConnect($db);
    $location = null;
    $locationViewTemplate = null;

    if(isset($_GET["id"])) {
        $location = $locationConnect->getLocation($_GET["id"]);
        $locationViewTemplate = new LocationViewTemplate($location);
    } else {
        echo "<p>Not Found!</p>";
    }

    if($locationViewTemplate) {
        echo $locationViewTemplate->displayLocationDetails();
    }
?>