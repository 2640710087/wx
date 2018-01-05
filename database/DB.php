<?php
require_once __DIR__ . '/Pdo_connect.php';
class DB extends Pdo_connect {
    private static $connect;
    protected static $config;
    private static $result;
    /**
     * DB constructor.
     */
    public static function dbs() {
        $config = '/../config/database.php';
        $dir = __DIR__ . $config;
        self::$config = require $dir;

        parent::setDsn(
            self::$config['mysql']['driver'],
            self::$config['mysql']['host'],
            self::$config['mysql']['username'],
            self::$config['mysql']['password'],
            self::$config['mysql']['database'],
            self::$config['mysql']['charset'],
            self::$config['mysql']['collation']
        );

        self::$connect = parent::connect();
    }

    /**
     * @param $sql
     * @param array|null $prep
     */
    public static function select ($sql, array $prep = null)
    {
        self::dbs();

        $x = self::$connect->prepare($sql);
//        if (isset($prep)){
//            foreach ($prep as $key => $value) {
//                $key = ':' . $key;
//                $x->bindParam($key,$value);
//            }
//        }
        $execute = $x->execute($prep);

        self::$result = $x;
        return $execute;
    }

    public static function fetchAll($pdoMod = PDO::FETCH_ASSOC) {
        return static::$result->fetchAll($pdoMod);
    }
    public static function fetch() {
        return static::$result->fetch();
    }
    /**
     * @return PDO
     */
    public function self () {
        return $this->connect();
    }
}
