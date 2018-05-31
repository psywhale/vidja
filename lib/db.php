<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 8/25/16
 * Time: 4:23 PM
 */
unset($DB);
global $DB,$CFG;
$DB = new medoo([
    'database_type' => $CFG->dbtype,
    'database_name' => $CFG->dbname,
    'server' => $CFG->dbhost,
    'username' => $CFG->dbuser,
    'password' => $CFG->dbpassword,
    'charset' => 'utf8'
]);