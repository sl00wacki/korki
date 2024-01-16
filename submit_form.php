<?php

$servername = "localhost";
$username = "root";
$password = "";  
$dbname = "forms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $realization = $_POST["real"];
    $day = isset($_POST["day"]) ? json_encode($_POST["day"], JSON_UNESCAPED_UNICODE) : "";
    $time = $_POST["time"];
    $duration = isset($_POST["duration"]) ? json_decode($_POST["duration"]) : "";
    $duration = is_numeric($duration) ? $duration : 0; 
    $place = $_POST["place"];
    $desc = $_POST["desc"];

    $formData = array(
        'title' => $title,
        'realization' => $realization,
        'day' => $day,
        'time' => $time,
        'duration' => $duration,
        'place' => $place,
        'desc' => $desc
    );

    $startTime = strtotime($time);
    $endTime = $startTime + ($duration * 3600); 

    $end_time = date("H:i", $endTime);

    $jsonData = json_encode($formData);

    $filePath = 'D:\xampp\htdocs\korki' . $title . '_data.json';

    file_put_contents($filePath, $jsonData);

    $sql = "INSERT INTO form (tytul, realizacja, day, czaszaczecia, miejsce, szczegoly, json_file_path, czaskonca) 
            VALUES ('$title', '$realization', '$day', '$time', '$place', '$desc', '$filePath', '$end_time')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>