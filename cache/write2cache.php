<?php
require_once __DIR__ . '/../tool/file/write_file.php';
require_once __DIR__ . '/../tool/file/read_file.php';
require_once __DIR__ . '/../database/DB.php';
require __DIR__ . '/../format/format.php';
DB::select('select section_id, section_title, section_starttime, section_endtime  from gk616_section');
$res = DB::$result->fetchAll(PDO::FETCH_ASSOC);
//$cachefile = new write_file();
//$cachefile->openFile('w+', 'section.cache.json');
//$format = Format::formatToJson($res);
//$cachefile->write($format);
$readfile = new read_file();
$file = $readfile->read('./section.cache.json');
echo md5(json_encode($res)) . "\n";
echo md5($file);
