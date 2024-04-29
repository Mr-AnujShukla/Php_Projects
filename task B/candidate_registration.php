<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Registration</title>
</head>
<body>
    <h1>Candidate Registration</h1>
    <form action="process_registration.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <label for="password">Temporary Password:</label>
        <input type="password" id="password" name="password"><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
