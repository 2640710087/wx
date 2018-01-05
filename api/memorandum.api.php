<?php
require_once __DIR__ . '/../autoload.php';

DB::select('select memorandum_title, memorandum_content, memorandum_realname, memorandum_time from gk616_memorandum where memorandum_id');
$result = DB::fetchAll(PDO::FETCH_ASSOC);
$field = [
    'title',
    'content',
    'pushUser',
    'pushTime'
];
//print_r($result);
$api_response_list = [];
foreach ($result as $num => $memorandum_cont) {
    $api_response [$num][0]= $memorandum_cont['memorandum_title'];
    $api_response [$num][1]= $memorandum_cont['memorandum_content'];
    $api_response [$num][2]= $memorandum_cont['memorandum_realname'];
    $api_response [$num][3]= $memorandum_cont['memorandum_time'];
}

foreach ($api_response as $key => $value) {
    array_push($api_response_list,array_combine($field, $value));
}
print_r($api_response_list);