# simple-curl

A basic CURL wrapper for PHP (see http://php.net/curl for more information about the libcurl extension for PHP)

[Initialise](https://github.com/aliergal/simple-curl#initialise) <br>
[GET Method](https://github.com/aliergal/simple-curl#get-method) <br>
[GET Method with Query](https://github.com/aliergal/simple-curl#get-method-with-query) <br>
[Post Method](https://github.com/aliergal/simple-curl#post-method) <br>
[Put Method](https://github.com/aliergal/simple-curl#put-method) <br>
[Tests](https://github.com/aliergal/simple-curl#tests) <br>

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
$response = $curl->put($vars);
```

### Output the response
```php
$headers = $response->headers;
$body = $response->body;
```

### Tests
Test files can be found within the test folder
