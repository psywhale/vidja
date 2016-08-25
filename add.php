<?php
require_once("config.php");
if(isset($_REQUEST["error"])){

	$message = "<h4><span class=\"label label-warning\">".decodeStr($_REQUEST["error"])."</span></h4>";

}
else{ $message = "";}
include("themes/head.html");
echo <<<EOT

<h2>Add video</h2>
   $message
  <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="/workit.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" id="title" placeholder="Title here">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
	<input type="hidden" name="MAX_FILE_SIZE" value="524288000" />
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




