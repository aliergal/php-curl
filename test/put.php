<?php
require '../src/curl.php';
$curl = new Curl;

$curl->headers['content-type'] = 'application/json';
$curl->url = 'http://requestb.in/1lhu29o1';

$var = [
	'post_id' => 515,
	'title' => 'New Title'
];
$var = json_encode($var, JSON_FORCE_OBJECT);
$response = $curl->put($var);



echo '<pre>';

echo '<b>Headers</b><br>';
print_r($response->headers);

echo '<hr>';

echo '<b>Body</b><br>';
print_r($response->body);

echo '</pre>';