<?php
print_r($_REQUEST);
if(isset($_REQUEST["submit"])){

$tmpname = $_FILES["file"]["tmp_name"];
$handle = fopen($tmpname,"r") or die("file open bad");
$head_1k = fread($handle,1024);
$baseencoded = base64_encode($head_1k);
$baseencoded = preg_replace("/[^A-Za-z0-9]/","",$baseencoded);
$sharecodes = str_split($baseencoded,8);

print_r($baseencoded);
print_r($sharecodes);
die;
}
else{
require_once("config.php");
include("themes/head.html");
echo <<<EOT

<h2>Add video</h2>

  <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="/workit.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="title" placeholder="Title here">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
<!--	<input type="hidden" name="MAX_FILE_SIZE" value="5000000000" />-->
        <input type="file" class="form-control id="file" name="file" accept="video/*">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
 </form>
EOT;
include("themes/foot.html");

}


