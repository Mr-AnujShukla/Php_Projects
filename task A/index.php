<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 27 Indian Actresses You Can Remember</title>
</head>
<body>
    <h1>Top 27 Indian Actresses You Can Remember</h1>
    <form action="process.php" method="post">
        <?php
        for ($i = 1; $i <= 27; $i++) {
            echo "<label for='actress$i'>Actress $i:</label>";
            echo "<input type='text' id='actress$i' name='actress[]'><br>";
        }
        ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
