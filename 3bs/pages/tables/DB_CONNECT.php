<?php

/*
 *establishing connection to database
 *@author gdev
 */

require_once('DB_CONFIG.php');

//create connection)
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);

//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/*
$query  = "select * from projects";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["PROJECT_ID"]. " - Name: " . $row["NAME"]. "- ADDRESS: " . $row["ADDRES"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
*/
?>