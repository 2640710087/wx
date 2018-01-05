<?php
//interface files {
//    public function getFileInfo($fileName);
//    public function openFile($mod, $filename);
//    public function closeFile($file);
//}
class file  {
    public $name;
    public $size;
    public $type;
    public $accessTime;
    public $modifyTime;
    public $changeTime;
    protected $files;
    public function getFileInfo($fileName) {
        $fileStat = stat($fileName);
        $this->name = $fileName;
        $this->size = $fileStat['size'];
        $this->accessTime = $fileStat['atime'];
        $this->modifyTime = $fileStat['mtime'];
        $this->changeTime = $fileStat['ctime'];
    }
    public function checkFile($fileName) {
        try {
            if (!isset($fileName)){
                throw new Exception("param is path or empty", 400);
            }
            if (!file_exists($fileName)) :
                throw new Exception("'$fileName' does not exist", 404);
            endif;
            if (!is_readable($fileName)) :
                throw new Exception("'$fileName' cannot be read", 501);
            endif;
        } catch (Exception $e) {
            if ($e->getCode() === 501) :
                die($e->getMessage() . "\non line:" . $e->getLine() . "\n" );
            endif;
            if ($e->getCode() === 404) :
                die($e->getMessage() . "\non line:" . $e->getLine() . "\n" );
            endif;
            if ($e->getCode() === 400) :
                die($e->getMessage() . "\non line:" . $e->getLine() . "\n" );
            endif;
        }
    }
    public function openFile($openMod = 'r', $fileName = null) {
        /**
         * checkFile & getFileInfo;
         */
        $this->checkFile($fileName);
        $this->getFileInfo($fileName);
        if (isset($fileName)) {
            $file = fopen($fileName, $openMod);
        } else {
            $file = fopen($this->name, $openMod);
        }
        $this->files = $file;
        return $file;
    }
    public function closeFile($file = null) {
        if (isset($file)):
            fclose($file);
        else:
//            echo $this->files;
            echo fclose($this->files);
//            echo $this->files;
        endif;
    }
}
