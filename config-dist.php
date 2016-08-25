<?php
unset $CFG;
global $CFG;
$CFG = new stdClass();
$CFG->dbhost="localhost";
$CFG->dbport=3306;
$CFG->dbsocket="";
$CFG->dbuser="";
$CFG->dbpassword="";
$CFG->dbname="vidja";

$CFG->workdir="";
$CFG->videostore="";
$CFG->thumbstore="";

require_once("lib/load.php");
