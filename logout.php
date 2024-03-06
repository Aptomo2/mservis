<?php
session_start();

// Session login dihancurkan
session_destroy();
echo "<script>location='index.php';</script>";

?>