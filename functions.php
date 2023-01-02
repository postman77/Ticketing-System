<?php
function pdo_connect_mysql() {

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'ticketing';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        exit('Failed to connect to database!');
    }
}

function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
        </head>
        <body>
        <nav class="navbar">
            <div>
                <h1>Ticketing System</h1>
                <a href="index.php"><i class="fas fa-ticket-alt"></i>Tickets</a>
            </div>
        </nav>
    EOT;
    }

function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
    ?>