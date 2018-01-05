<?php

require_once __DIR__ . '/file.php';
class write_file extends file {
    public function write($content, $length = null) {
        if (!isset($length)) {
            $file_w = fwrite($this->files, $content);
        } else {
            $file_w = fwrite($this->files, $content, $length);
        }
        return $file_w;
    }
}
