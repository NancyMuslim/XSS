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
session_start(); // Starts or resumes the session

// Check if the 'comments' session variable is set; if not, initialize it
if (!isset($_SESSION['comments'])) {
    $_SESSION['comments'] = [];
}

// Check if the request method is GET and if 'comment' and 'name' are set
if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['comment']) && isset($_GET['name'])) {
    // Retrieve user input directly without escaping
    $xss = $_GET['comment'];
    $name = $_GET['name'];
    
    // Add the user input directly to the session variable
    $_SESSION['comments'][] = ['name' => $name, 'comment' => $xss];
}

// Display stored comments
foreach ($_SESSION['comments'] as $entry) {
    echo '<p><strong>' . $entry['name'] . ':</strong> ' . $entry['comment'] . '</p>';
}
?>
    </body>
</html>
