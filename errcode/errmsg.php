<?php


class ErrMsg {
    public $errMsg;
    public $code;
    public static $error_code_repo;

    /**
     * @param $code
     * @return int
     */
    public function get_error_array($code) {
        self::$error_code_repo = require __DIR__ . '/../config/error_code.php';
        foreach (self::$error_code_repo as $key => $value) {
            if ($key == $code) {
                return $value;
            } else {
                return 0;
            }
        }
    }

}
