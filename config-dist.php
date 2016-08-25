<?php
unset($CFG);
global $CFG;
$CFG = new stdClass();
$CFG->dbtype="mysql";
$CFG->dbhost="localhost";
$CFG->dbport=3306;
$CFG->dbsocket="";
$CFG->dbuser="";
$CFG->dbpassword="";
$CFG->dbname="vidja";

$CFG->workdir="/var/www/working";
$CFG->videostore="/var/www/html/movietest";
$CFG->thumbstore="/var/www/html/movietest";

require_once("lib/load.php");
