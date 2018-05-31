<?php
require_once("config.php");

include("themes/head.html");


echo <<<EOT
<h2>Add video</h2>

  <form class="form-horizontal" role="form">
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-10">


        <input type="text" class="form-control" id="title" placeholder="Title here">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
EOT;


include("themes/foot.html");
