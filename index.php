<?php
    // Get from App Service Connection String
    $host = "centralize-mysql01.mysql.database.azure.com";
    $user = "cenon4dno@centralize-mysql01";
    $pass = "HoneyPaxn97*";

    // Connect to DB
    $dbname = "php-apache-mysql";
    $conn = new mysqli($host, $user, $pass, $dbname);

    // Declare a var for enabling the HTML page
    $enable = 0;

    if ($conn->connect_error) {
        // Connection Error
        die("Connection failed: " . $conn->connect_error);
    } else {
        // Select the content table
        $sql = "SELECT * FROM content LIMIT 1";
        $result = $conn->query($sql);
        $row1 = $result->fetch_assoc();

        // When results are successful
        if ($row1) {
            $enable = 1;
            $client_msg = str_replace('CLIENT', $row1['client'], $row1['msg']);
        }
    }

    if ($enable) {
?>

<!DOCTYPE html>
<html>
    <title>Azure Demo - Template 01</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,h1,h2,h3,h4,h5,h6 {
            font-family: "Raleway", sans-serif
        }

        body, html {
            height: 100%;
            line-height: 1.8;
        }

        /* Full height image header */
        .bgimg-1 {
            background-position: center;
            background-size: cover;
            background-image: url("/images/ms-suraface03.jpg");
            min-height: 100%;
        }

        .w3-bar .w3-button {
            padding: 16px;
        }
    </style>
    <body>
        <!-- Header with full-height image -->
        <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
        <div class="w3-display-left w3-text-white" style="padding:48px">
            <span class="w3-jumbo w3-hide-small"><?php echo $client_msg; ?></span><br>
            <p><a href="https://github.com/cenon4dno/php-apache-mysql" target="_blank" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">GitHub Repo (1)</a></p>
        </div> 
        </header>
    </body>
</html>


<?php
    }
?>