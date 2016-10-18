<?php

require_once('config.php');


require_once("themes/head.html");

echo '<div class="page-header">
        <h1>Video List</h1>
      </div>';

echo "<h4><span class=\"label label-info\">Click the Thumbnail to load the video</span></h4>";

//$DB->debug();

$movies = $DB->select("Movies","*");


if(is_array($movies)) {
    foreach ($movies as $movie) {
        echo '<div class="row"><div class="col-md-6" >
    <div class="panel panel-primary">
       <div class="panel-heading">
         <h3 class="panel-title">' . $movie['Title'] . '</h3>
       </div>
       <div class="panel-body" id="rw' . $movie['id'] . '">
          <img src="/movietest/' . $movie['sharecode'] . '.jpg"/>
       </div>
    </div>
    
	</div><div class="col-md-6"><textarea><video width="400" controls="controls" poster="http://vidja.wosc.edu/movietest/' . $movie['sharecode'] . '.jpg"> <source src="http://vidja.wosc.edu/movietest/' . $movie['sharecode'] . '.webm" type="video/webm" /> Your browser does not support HTML5 video. </video></textarea></div>
     </div>
     <script>
    $(\'#rw' . $movie['id'] . '\').click(function(){playvid("rw' . $movie['id'] . '", "' . $movie['sharecode'] . '");});</script>
     ';


        echo "
    <script>
     function playvid(element, vid) {
         var d = document.getElementById(element);
         var v = vid;
         d.innerHTML = '<video width=\"400\" controls=\"controls\" poster=\"/movietest/'+ v +'.jpg\"> <source src=\"/movietest/'+ v +'.webm\" type=\"video/webm\" /> Your browser does not support HTML5 video. </video>';
     }
     </script>";
    }
}

require_once("themes/foot.html");


