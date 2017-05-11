<?php
require '../src/curl.php';
$curl = new Curl;

$curl->headers['content-type'] = 'application/json';
$curl->url = 'http://requestb.in/1lhu29o1';

$var = [
	'title' => 'This is a title',
	'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in mi in diam tincidunt euismod eget vel erat. Vivamus accumsan suscipit quam ut volutpat. In dapibus lacus mauris, at tempor nulla accumsan sed. Cras a molestie lorem, non imperdiet tortor. Sed commodo sem fermentum elit maximus, id aliquet sapien luctus. In imperdiet sodales elit vitae sollicitudin. Aliquam venenatis pretium risus eget commodo. Proin nec risus id velit pulvinar hendrerit vitae nec nulla. Nullam id libero nibh. Nunc vitae ullamcorper tortor, quis pharetra justo. Vestibulum eleifend, mi at tincidunt auctor, diam lectus faucibus leo, imperdiet gravida metus dui quis nisi. Donec bibendum laoreet libero et viverra. Maecenas orci nulla, volutpat at ligula in, iaculis porta erat. Pellentesque ac tempus ante, ut egestas sapien.'
];
$var = json_encode($var, JSON_FORCE_OBJECT);
$response = $curl->post($var);



echo '<pre>';

echo '<b>Headers</b><br>';
print_r($response->headers);

echo '<hr>';

echo '<b>Body</b><br>';
print_r($response->body);

echo '</pre>';