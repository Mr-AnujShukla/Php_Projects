<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actress'])) {
    $actressNames = $_POST['actress'];
    
    // Save actress names to MySQL database
    $conn = mysqli_connect('localhost', 'root', '', 'actresses_db');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    foreach ($actressNames as $actress) {
        $sql = "INSERT INTO actresses (test) VALUES ('$actress')";
        mysqli_query($conn, $sql);
    }

    mysqli_close($conn);

    // Send data to Zapier Webhooks
    $webhook_url = 'https://hooks.zapier.com/hooks/catch/18703331/37sv8mi/';

    $data = array(
        'actress_names' => $actressNames
    );

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json",
            'method'  => 'POST',
            'content' => json_encode($data)
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($webhook_url, false, $context);
    if ($result === FALSE) {
        // Handle error
    }

    // Redirect to a confirmation page with actress names in the URL
    $urlParams = http_build_query(['actresses' => $actressNames]);
    header("Location: confirmation.php?$urlParams");
    exit();
} else {
    echo "Form submission error.";
}
?>
