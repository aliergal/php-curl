<?php
require_once __DIR__ . '/response.php';
class Curl {
    
    public $follow_redirects = true;
    public $headers = array();
    public $options = array();
    public $referer;
    public $user_agent;
    public $body_type;
    public $url;

    protected $error = '';
    protected $request;

    function __construct() {
        $this->user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Curl/PHP '.PHP_VERSION.' (http://atom42.co.uk)';
    }
    
    function delete($vars = array()) {
        return $this->request('DELETE', $vars);
    }
    
    function error() {
        return $this->error;
    }
    
    function get($vars = array()) {
        if (!empty($vars)) {
            $this->url .= (stripos($url, '?') !== false) ? '&' : '?';
            $this->url .= (is_string($vars)) ? $vars : http_build_query($vars, '', '&');
        }
        return $this->request('GET');
    }
    
    function head($vars = array()) {
        return $this->request('HEAD', $vars);
    }
    
    function post($vars = array()) {
        return $this->request('POST', $vars);
    }
    
    function put($vars = array()) {
        return $this->request('PUT', $vars);
    }
    
    function request($method, $vars = array()) {
        $this->error = '';
        $this->request = curl_init();
        
        $this->set_request_method($method);
        $this->set_request_options($vars);
        $this->set_request_headers();
        
        $response = curl_exec($this->request);
        
        if ($response) {
            $response = new CurlResponse($response);
        } else {
            $this->error = curl_errno($this->request).' - '.curl_error($this->request);
        }
        
        curl_close($this->request);
        
        return $response;
    }
    
    protected function set_request_headers() {
        $headers = array();
        foreach ($this->headers as $key => $value) {
            $headers[] = $key.': '.$value;
        }
        curl_setopt($this->request, CURLOPT_HTTPHEADER, $headers);
    }
    
    protected function set_request_method($method) {
        switch (strtoupper($method)) {
            case 'HEAD':
                curl_setopt($this->request, CURLOPT_NOBODY, true);
                break;
            case 'GET':
                curl_setopt($this->request, CURLOPT_HTTPGET, true);
                break;
            case 'POST':
                curl_setopt($this->request, CURLOPT_POST, true);
                break;
            default:
                curl_setopt($this->request, CURLOPT_CUSTOMREQUEST, $method);
        }
    }
    
    protected function set_request_options($vars) {
        curl_setopt($this->request, CURLOPT_URL, $this->url);
        if (!empty($vars)) curl_setopt($this->request, CURLOPT_POSTFIELDS, $vars);
        
        curl_setopt($this->request, CURLOPT_HEADER, true);
        curl_setopt($this->request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->request, CURLOPT_USERAGENT, $this->user_agent);

        if ($this->follow_redirects) curl_setopt($this->request, CURLOPT_FOLLOWLOCATION, true);
        if ($this->referer) curl_setopt($this->request, CURLOPT_REFERER, $this->referer);
        
        foreach ($this->options as $option => $value) {
            curl_setopt($this->request, constant('CURLOPT_'.str_replace('CURLOPT_', '', strtoupper($option))), $value);
        }
    }
}