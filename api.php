<?php

$conn = mysqli_connect("localhost", "root", "", "api_data");
$response = array();

if ($conn) {
    // echo "DB connection done";
    $sql = "select * from data";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Content-Type:JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]["id"] = $row["id"];
            $response[$i]["name"] = $row["name"];
            $response[$i]["age"] = $row["age"];
            $response[$i]["email"] = $row["email"];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);

    }    
} else {
    die(mysqli_error($conn));
}

?>