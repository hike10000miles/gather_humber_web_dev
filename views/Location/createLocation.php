<!DOCTYPE html>
<html>
    <head>
        <title>Location Create | Gather</title>
    </head>
    <body>
        <?php
            if(!defined("__root")) {
                require( $_SERVER['DOCUMENT_ROOT']. "\gather_tryout_1\\configer.php");
            }
            include __root . "DBConnect/connect.php";
            include __root . "controlers\LocationControler\LocationConnect.php";
            include __root . "views/components/header.php";
       
            $locationConnect = new LocationConnect(Connect::dbConnect());
            $result = null; 
            if ( isset($_POST["BusinessName"]) && isset($_POST["StreetName"]) &&
                 isset($_POST["PostalCode"]) && isset($_POST["City"]) &&
                 isset($_POST["Province"]) && isset($_POST["Country"])
             ) {
                $locationModel = new LocationModel($_POST);
                $result = $locationConnect->createLocation($locationModel);
                if($result) {
                    header("Location: http://localhost/gather_tryout_1");
                    exit;
                }
            } else {

            }

        ?>

        <div>
            <form action="createLocation.php" method="POST" >
                <input type="text" name="Id" value="0" hidden />
                <div>
                    <label for="BusinessName">Business Name:</label>
                    <input type="text" name="BusinessName" />
                </div>
                <div>
                    <label for="StreetName">Street Name:</label>
                    <input type="text" name="StreetName" />
                </div>
                <div>
                    <label for="PostalCode">Postal Code:</label>
                    <input type="text" name="PostalCode" />
                </div>
                <div>
                    <label for="City">City:</label>
                    <input type="text" name="City" />
                </div>
                <div>
                    <label for="Province">Province:</label>
                    <input type="text" name="Province" />
                </div>
                <div>
                    <label for="Country">Country:</label>
                    <input type="text" name="Country" />
                </div>
                <div>
                    <input type="submit" value="submit" />
                </div>
            </form>
        </div>
    </body>
</html>