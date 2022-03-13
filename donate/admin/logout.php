<?php

 setcookie("u_n", '', time() - 3600, '/');

header('Location:index.php');

?>