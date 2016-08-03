<?php

require_once('config.php');


require_once("themes/head.html");

$con = new mysqli($CFG->dbhost, $CFG->dbuser, $CFG->dbpassword, $CFG->dbname, $CFG->dbport, $CFG->dbsocket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

echo '<div class="page-header">
        <h1>Video List</h1>
      </div>';

echo "<h1><span class=\"label label-warning\">Click the Thumbnail to load the video</span></h1>";

$query = "SELECT `Movies`.`id`,     `Movies`.`Title`,     `Movies`.`sharecode`,     `Movies`.`added` FROM `vidja`.`Movies";


if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($id, $Title, $sharecode, $added);
    while ($stmt->fetch()) {
        //printf("%s, %s, %s, %s\n", $id, $Title, $sharecode, $added);
	echo '<div class="row"><div class="col-md-6" >
    <div class="panel panel-primary">
       <div class="panel-heading">
         <h3 class="panel-title">'.$Title.'</h3>
       </div>
       <div class="panel-body" id="rw'.$id.'">
          <img src="/movietest/'.$sharecode.'.jpg"/>
       </div>
    </div>
    
	</div><div class="col-md-6"><textarea><video width="400" controls="controls" poster="http://vidja.wosc.edu/movietest/'.$sharecode.'.jpg"> <source src="http://vidja.wosc.edu/movietest/'.$sharecode.'.webm" type="video/webm" /> Your browser does not support HTML5 video. </video></textarea></div>
     </div>
     <script>
    $(\'#rw'.$id.'\').click(function(){playvid("rw'.$id.'", "'.$sharecode.'");});</script>
     ';
    }
    $stmt->close();
    echo "
    <script>
     function playvid(element, vid) {
         var d = document.getElementById(element);
         var v = vid;
         d.innerHTML = '<video width=\"400\" controls=\"controls\" poster=\"/movietest/'+ v +'.jpg\"> <source src=\"/movietest/'+ v +'.webm\" type=\"video/webm\" /> Your browser does not support HTML5 video. </video>';
     }
     </script>";
}

$con->close();

require_once("themes/foot.html");


