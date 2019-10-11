<?php
global $CFG;



function connectRabbit()
{
    global $CFG;
    $connection = [
        'host'=>$CFG->rMQhost,
        'vhost'=>$CFG->rMQvhost,
        'user' => $CFG->rMQuser,
        'password'=> $CFG->rMQpassword,
    ];
    $rabbit = new \Bunny\Client($connection);
    try {
        $rabbit->connect();

        return $rabbit;
    }
    catch (Exception $e) {
        $log = new Monolog\Logger("rabbit");
        $log->pushHandler(new \Monolog\Handler\SyslogHandler("VIDJARMQ");
        $log->err($e->getMessage());
        return false;
    }

}

function createChannelRabbit($name, $rabbit_instance=null){
    if(is_null($rabbit_instance)) {
        $rabbit_instance = connectRabbit();
    }
    $channel = $rabbit_instance->channel();
    $channel->queueDeclare($name);
    return $channel;

}

