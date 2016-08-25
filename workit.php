<?php

print_r($_REQUEST);
//if(isset($_REQUEST["submit"])){

$tmpname = $_FILES["file"]["tmp_name"];
$handle = fopen($tmpname,"r") or die("file open bad");
$head_1k = fread($handle,1024);
$baseencoded = base64_encode($head_1k);
$baseencoded = preg_replace("/[^A-Za-z0-9]/","",$baseencoded);
$sharecodes = str_split($baseencoded,8);

print_r($baseencoded);
print_r($sharecodes);
die;
