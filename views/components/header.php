<?php
    if(!defined("__root")) {
        require( $_SERVER['DOCUMENT_ROOT']. "\gather_tryout_1\\configer.php");
    }
    $httpRoot = "http://localhost/gather_tryout_1/";
?>
<nav>
    <ul>
        <li><a href=<?php echo $httpRoot."index.php"; ?>>All Events</a></li>
        <li><a href=<?php echo $httpRoot."views/Event/createEvent.php"?>>Create Event</a></li>
        <li><a href=<?php echo $httpRoot."views/Location/createLocation.php"?>>Create Location</a></li>
    </ul>
</nav>
