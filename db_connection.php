<?php
function OpenCon()
 {
 $dbhost = "localhost:8111";
 $dbuser = "root";
 $dbpass = "1234";
 $db = "airminumku";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>