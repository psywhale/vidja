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
$CFG->webroot="/var/www/html";
$CFG->videostore="movietest";
$CFG->thumbstore="movietest";

// RabbitMQ configuration
$CFG->rMQhost = "localhost";
$CFG->rMQvhost = "/";
$CFG->rMQuser = "guest";
$CFG->rMQpassword = "guest";

require_once("lib/load.php");
