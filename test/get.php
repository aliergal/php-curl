<?php
require '../src/curl.php';
$curl = new Curl;

$curl->url = 'http://requestb.in/1lhu29o1';
$response = $curl->get();


echo '<pre>';

echo '<b>Headers</b><br>';
print_r($response->headers);

echo '<hr>';

echo '<b>Body</b><br>';
print_r($response->body);

echo '</pre>';