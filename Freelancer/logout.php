<?php
session_start();
session_destroy();
header('Location:http://localhost/primis/Main/login.php');
 ?>