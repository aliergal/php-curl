# simple-curl

A basic CURL wrapper for PHP (see http://php.net/curl for more information about the libcurl extension for PHP)

### Initialise

```php
require 'curl.php';
$curl = new Curl;
```

### GET Method

```php
$curl->url = 'http://www.google.com';
$response = $curl->get();
```

### GET Method with Query

```php
$curl->url = 'http://www.google.com';
$vars = [
  'q' => 'test'
];
$response = $curl->get($vars);
```

### POST Method

```php
$curl->url = 'http://www.test.com/posts';
$vars = [
  'title' => 'Title',
  'body' => 'This is a sample body'
];
$body = json_encode($vars); //If you want to send json object
$response = $curl->post($vars);
```

### Output the response
```php
$headers = $response->headers;
$body = $response->body;
```
 
