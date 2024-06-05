<?php

http_response_code(404);

//header("HTTP/1.0 404 Not Found");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        404 Page Not Found
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="error-container">
        <h1>404</h1>
        <p>
            Oops! The page you're looking for is not here.
        </p>
        <a href="/">Go Back to Home</a>
    </div>
</body>
</html>