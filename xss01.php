<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>XSS Lab</title>
    </head>
    <body>
        <h2>Leave a comment</h2>
        <form action="" method="GET">
            <label>Comment:</label>
            <textarea required rows="12" cols="300" name="comment"></textarea>
            <label>Name:</label>
            <input required type="text" name="name">
            <button type="submit">Post Comment</button>
        </form>

        <h2>Comments:</h2>
        <?php
        session_start();

        // Initialize comments array if not already done
        if (!isset($_SESSION['comments'])) {
            $_SESSION['comments'] = [];
        }

        // Check if the request method is GET and if the 'comment' & 'name' parameter is set
        if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['comment']) && isset($_GET['name'])) {

            // Retrieve the 'comment' & 'name' parameter from the GET request 
            $xss = $_GET['comment'];
            $name = htmlspecialchars($_GET['name']);

            // Store the sanitized comment and name in the session
            $_SESSION['comments'][] = ['name' => $name, 'comment' => $xss];
        }

        // Display comments
        foreach ($_SESSION['comments'] as $data) {
            echo '<p><strong>' . $data['name'] . ':</strong> ' . $data['comment'] . '</p>';
        }
        ?>
    </body>
</html>
