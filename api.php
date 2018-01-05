<?php
require_once 'database/DB.php';
require_once 'format/format.php';
require_once 'errcode/errmsg.php';

class api {
    public $request;
    public $response;
    public $config;
    public function request($api, $param, $format = 'json') {
        $this->config['api'] = $api;
        $this->config['param'] = $param;
        $this->config['format'] = $format;
    }
    public function response() {
       if ($this->config['format'] === 'json') {
           return Format::formatToJson();
       }
       if ($this->config['format'] === 'xml') {
           return Format::formatToXml();
       }
    }
    public function getApi() {

    }
}


