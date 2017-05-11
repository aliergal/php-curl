<?php
require '../src/curl.php';
$curl = new Curl;

$curl->url = 'http://requestb.in/1lhu29o1';

$var = [
	'fromDate' => '2017-04-01',
	'toDate' => '2017-05-01',
	'isPost' => true
];
$response = $curl->get($var);



echo '<pre>';

echo '<b>Headers</b><br>';
print_r($response->headers);

echo '<hr>';

echo '<b>Body</b><br>';
print_r($response->body);

echo '</pre>';