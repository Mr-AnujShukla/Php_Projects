<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
</head>
<body>
    <h1>Thank You!</h1>
    <p>You have submitted the following actress names:</p>
    <ul>
        <?php
        if (isset($_GET['actresses'])) {
            $actressNames = $_GET['actresses'];
            foreach ($actressNames as $actress) {
                echo "<li>$actress</li>";
            }
        }
        ?>
    </ul>
</body>
</html>
