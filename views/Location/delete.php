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
    } elseif (isset($_POST['id'])) {
        $location = $locationConnect->getLocation($_POST["id"]);
        $result = $locationConnect->deleteLocation($location);
        if($result) {
            header("Location: http://localhost/gather_tryout_1");
            exit;
        } else {
            echo "<h1>Something went wrong!</h1>";
        }
    }else {
        echo "<p>Not Found!</p>";
    }

    if($locationViewTemplate) {
        echo $locationViewTemplate->displayLocationDelete();
    }
?>