<?php
require_once("config.php");
//print_r($_REQUEST["title"]);
//if(isset($_REQUEST["submit"])){
$title = preg_replace("/[^A-Za-z0-9\ ]/","",$_REQUEST["title"]);
if($_FILES["file"]['error'] === UPLOAD_ERR_OK)
{
   $tmpname = $_FILES["file"]["tmp_name"];
   $handle = fopen($tmpname,"r") or die("file open bad");
   $head_1k = fread($handle,4096);
   $head_1k = fread($handle,1024);
   fclose($handle);
   $baseencoded = base64_encode($head_1k);
   $baseencoded = preg_replace("/[^A-Za-z0-9]/","",$baseencoded);
   $sharecodes = str_split($baseencoded,8);
   $sharecode = $sharecodes[42];
   move_uploaded_file($tmpname,"$CFG->workdir/$sharecode.wip");
   $idnumber = $DB->insert("Movies",["Title"=>$title,"sharecode"=>$sharecode,"#added"=>"now()"]);
   //$idnumber = $DB->get("Movies",null,"id","sharecode=\"$sharecode\"");
   $DB->insert("Status",["Movies_id"=>$idnumber,"status"=>"0"]);
}
else {
  $code = $_FILES["file"]['error'];
  switch ($code) { 
            case 1: 
                $message = encodeStr("The uploaded file exceeds the upload_max_filesize directive in php.ini"); 
                break; 
            case 2: 
                $message = encodeStr( "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form"); 
                break; 
            case 3: 
                $message = encodeStr("The uploaded file was only partially uploaded"); 
                break; 
            case 4: 
                $message = encodeStr("No file was uploaded"); 
                break; 
            case 5: 
                $message = encodeStr("Missing a temporary folder"); 
                break; 
            case 6: 
                $message = encodeStr("Failed to write file to disk"); 
                break; 
            case 7: 
                $message = encodeStr("File upload stopped by extension"); 
                break; 

            default: 
                $message = encodeStr("Unknown upload error"); 
                break; 
        } 
        header("Location: http://vidja.wosc.edu/add.php?error=$message");
	die;
} 
