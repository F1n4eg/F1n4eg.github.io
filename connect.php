<?php
header("Content-Type: text/html; charset = utf-8;");
header("Content-Encoding: utf-8");
?>
<html>
<head>
<title>Group list forming</title>
</head>
<body>
    <?php 
        $connection = mysqli_connect('localhost', 'root', '/Vev_yqTFFTzWmlM'); // підключення до mysql
        $database = 'users';
        $select_db = mysqli_select_db($connection, $database); //обираємо базу даних
       // mysqli_close($connection);
    ?>
</body>
</html>