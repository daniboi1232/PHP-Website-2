<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./stylesheets/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Page</title>
</head>
<body>
<?php

require "connect.inc";
include "nav.php";


?>

<br> <h1>Insert Trap Information to Add Into Database</h1> <br>

<?php
include "insertnew.php";

include "footer.php";
?>
</body>
</html>