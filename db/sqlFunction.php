<?php 
require_once('config.php');

// Execute query INSERT, UPDATE, DELETE
function execute($sql) {
    // Create connection to database
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    // Query
    mysqli_query($conn, $sql);

    // Close connection
    mysqli_close($conn);
}

// SELECT
function executeSelect($sql){
    // Create connection to database
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    // Query
    $result = mysqli_query($conn, $sql);
    $list = [];
    while($row = mysqli_fetch_array($result, 1)) {
        $list[] = $row;
    }

    // Close connection
    mysqli_close($conn);
    
    return $list;
}