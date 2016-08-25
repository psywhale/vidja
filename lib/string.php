<?php

function decodeStr($string = "") {
    if($string) {
        $unroted = str_rot13($string);
	$decoded = base64_decode($unroted);
	return $decoded;
    }
    return null;

}

function encodeStr($string = "") {
    if($string) {
	$encoded = base64_encode(trim($string));
        $encoded = str_rot13($encoded);
	return $encoded;
    }
    return null;

}
