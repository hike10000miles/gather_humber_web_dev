<!DOCTYPE html>
<html>
    <head>
        <title>Location Edit | Gather</title>
    </head>
    <body>
        <?php
            if(!defined("__root")) {
                require( $_SERVER['DOCUMENT_ROOT']. "\gather_tryout_1\\configer.php");
            }
            include __root."DBConnect/connect.php";
            include __root."controlers\LocationControler\LocationConnect.php";
            include __root."library\LocationViewTemplate.php";
            include __root."views/components/header.php";
       
            $locationConnect = new LocationConnect(Connect::dbConnect());
            $result = null;
            $locationEditForm = null;
            if (isset($_POST["StreetName"]) && isset($_POST["PostalCode"]) && isset($_POST["City"]) &&
                 isset($_POST["Province"]) && isset($_POST["Country"])
             ) {
                $locationModel = new LocationModel($_POST);
                $result = $locationConnect->editLocation($locationModel);
                if($result) {
                    header("Location: http://localhost/gather_tryout_1");
                    exit;
                }
                } else {
                    echo "<h1>Something went wrong</h1>";
                }

        ?>

        <div>
            <?php
                if(isset($_GET["id"])) {
                    $location = $locationConnect->getLocation($_GET["id"]); 
                    $locationTemplate = new LocationViewTemplate($location);
                    $locationEditForm = $locationTemplate->displayLocationEditForm();
                    echo $locationEditForm;
                } else {
                    echo "<p>not set</p>";
                }
            ?>
        </div>
    </body>
</html>