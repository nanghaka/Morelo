<?php
include_once 'include/DB_Connect.php';

function createNewReport() {
    if (isset($_POST["reporttype"]) && $_POST["reporttype"] != "") {
      
        // response array for json
        $response = array();
        $reporttype = $_POST["reporttype"];
        $reporterid = $_POST["reporterid"] // this is the id of the user 
        $locationstreet = $_POST["locationstreet"];
        $locationlat = $_POST["locationlat"];
        $locationlong = $_POST["locationlong"];
        $descriptionoffender = $_POST["descriptionoffender"];
        $descriptionreport = $_POST["descriptionreport"];

        
        $db = new DbConnect();

        // mysql query
        $query = "INSERT INTO `reports` (`reporttype`, `reporterid`, `locationstreet`, `locationlat`, `locationlong`, `descriptionoffender`, `descriptionreport`) VALUES ('$reporttype', '$reporterid', '$locationstreet', '$locationlat', '$locationlong', '$descriptionoffender', '$descriptionreport')";
        //$query = "INSERT INTO reports(reporttype) VALUES('$reporttype')";
        $result = mysql_query($query) or die(mysql_error());
        if ($result) {
            $response["error"] = false;
            $response["message"] = "Category created successfully!";
        } else {
            $response["error"] = true;
            $response["message"] = "Failed to create Report!";
        }
    } else {
        $response["error"] = true;
        $response["message"] = "Report name is missing!";
    }
    
    // echo json response
    echo json_encode($response);
}

createNewReport();
?>