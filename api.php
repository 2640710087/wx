<?php
require_once 'database/DB.php';
//require_once 'format/format.php';
require_once 'errcode/errmsg.php';
require_once 'autoload.php';
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
        require_once __DIR__ . '/api/memorandum.api.php';
        $notes = new memorandum();
        $notes->setLength($this->config['param']['length']);
        $data = $notes->getdb();
        if ($this->config['format'] === 'json') {
//            $data = $this->config;
//            print_r($data);
           return Format::formatToJson($data);
       }
       if ($this->config['format'] === 'xml') {
           return Format::formatToXml($data);
       }
    }
    public function getApi() {

    }
}
if (isset($_GET['api'])) {
    $api = new api();
    $api->request($_GET['api'], ['length' => $_GET['length']]);
    echo $api-> response();
}


