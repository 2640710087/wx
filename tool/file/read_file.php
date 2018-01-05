<?php

require_once __DIR__ . '/file.php';
class read_file extends file {
    public $fileLength;
    private $file;

    /**
     * @param int $length
     * @return bool|string
     */
    public function setLength($length) {
        $this->fileLength = $length;
        return $this->readAll();
    }

    /**
     * @return bool|string
     */
    private function readAll() {
        return fread($this->file, $this->fileLength);
    }

    /**
     * @param null $file
     * @param int|null $readLength
     * @return $this
     */
    public function read($file = null, $readLength = null) {
        $filecheck = $file ? $file : $this->name;
        $this->checkFile($filecheck);
        if (isset($file) && is_string($file)) :
            $files = $this->openFile('r', $file);
//            $this->files = $files;
            if (isset($readLength)) :
                $fileslength = $readLength;
            else :
                $fileslength = filesize($file);
            endif;
            return fread($files, $fileslength);
        else:
            $this->file = $this->files;
            if (isset($readLength)) :
                $fileslength = $readLength;
            else :
                $fileslength = $this->size;
            endif;
            $this->fileLength = $fileslength;
            return $this;
        endif;
    }

    public function B2b($xbit, $to, $number_format) {
        $reps = ['bit', 'Bytes', 'KB', 'MB', 'GB', 'TB'];
        preg_match('/([0-9]*)([a-zA-Z]{1,2})*/', $xbit, $matches);
        foreach ($reps as $key => $value) {
            preg_match('/^' . $matches[2] . '/i', $value, $match);
            if (isset($match[0])) {
                if ($key-1 < 0) {
                    $x = $matches[1];
                }else {
                    $x = $matches[1] / pow(2,($key-1)*10) * 8;
                }
                echo number_format($x,2);
                break;
            }
        }
        print_r($matches);
        return $key;
    }
}
$file = new read_file();
$sd = $file->read(__DIR__.'/../../config/md5.php');
echo $x = base64_decode($sd);
print_r(json_decode($x, true));
//echo $file->size;
//$file->closeFile();
