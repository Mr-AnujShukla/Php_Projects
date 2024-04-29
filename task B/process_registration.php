<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Save data to MySQL database
    $conn = mysqli_connect('localhost', 'root', '', 'candidates');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO candidates (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        // Send data to Zapier Webhooks
        $webhook_url = 'https://hooks.zapier.com/hooks/catch/18703331/378y3l0/';

        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password
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

        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Form submission error.";
}
?>
