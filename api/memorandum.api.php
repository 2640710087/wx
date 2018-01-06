<?php
require_once __DIR__ . '/../autoload.php';
class memorandum {
    private $config;
    public function setLength($length) {
        return $this->config['length'] = $length;
    }
    public function getdb() {
        DB::select('select memorandum_title, memorandum_content, memorandum_realname, memorandum_time from gk616_memorandum limit ' . $this->config['length']);
        $result = DB::fetchAll(PDO::FETCH_ASSOC);
        $field = [
            'title',
            'content',
            'pushUser',
            'pushTime'
        ];
        $api_response_list = [];
        foreach ($result as $num => $memorandum_cont) {
            $api_response [$num][0]= $memorandum_cont['memorandum_title'];
            $api_response [$num][1]= $memorandum_cont['memorandum_content'];
            $api_response [$num][2]= $memorandum_cont['memorandum_realname'];
            $api_response [$num][3]= $memorandum_cont['memorandum_time'];
        }

        foreach ($api_response as $key => $value) {
//            if ($this->config['length'] === $key) {
                array_push($api_response_list,array_combine($field, $value));
//                break;
//            }
        }

        return $api_response_list;
    }
}


