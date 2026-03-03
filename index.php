<?php
include("db.php");

$status_msg = "";
//Create an if-statement that checks if data was submitted in the button.
if (isset($_POST["submit"])) {
        // Filtering input, and initializes it for an sql query.
        $user = mysqli_real_escape_string($conn, $_POST["username"]);
        $msg = mysqli_real_escape_string($conn, $_POST["message"]);

      //The SQL Query, gets the data from the form and inserts in into the database
        $sql = "INSERT INTO post (username, message) VALUES ('$user', '$msg')";

        /*Executes the query, connects to the database and then does the query, and if its successful or not
        it displays a message*/
        if (mysqli_query($conn, $sql)) {
            $status_msg = "<p style='color:green;'> Post added successfully!</p>";
        } else {
            $status_msg = "Error: " . mysqli_error($conn);        
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reel_Me</title>
</head>
<body>
    <form action="index.php" method="POST">
        <h2> Post a message </h2>
        <input type="text" name="username" placeholder="Your Name" required><br><br>
        <textarea name="message" id="Message" placeholder="What's on your mind?" required></textarea><br><br>
        <input type="submit" name="submit" value="Post to Wall">
    <?php 
        $result= mysqli_query($conn,"SELECT * FROM post ORDER BY user_id ASC");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>";
            echo "<strong>" . $row["username"] .  "</strong><br>";
            echo "<p>". $row["message"] ."</p>";
            echo "</div>";
        }
    ?>
    </form>
    </body>
</html>