<?php

class Pdo_connect {

    /**
     * @var string
     */
    public static $username;

    /**
     * @var string
     */
    public static $password;

    /**
     * @var string
     */
    public static $host;

    /**
     * @var string
     */
    public static $database;

    /**
     * @var string
     */
    public static $driver;
    public static $charset;
    public static $collation;
    public static $options;
    /**
     * @var string
     */
    public static $dsn;
    public static function setDsn (
        $driver,
        $host,
        $username,
        $password,
        $database,
        $charset,
        $collation
    ) {
            self::$driver = $driver;
            self::$host = $host;
            self::$username = $username;
            self::$password = $password;
            self::$database = $database;
            self::$charset = $charset;
            self::$collation = $collation;
            self::$options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => true,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collation"
            ];
            self::$dsn = self::$driver . ":host=" . self::$host.";dbname=" . self::$database;
    }
    public static function connect () {

        try {
            $pdo = new PDO(self::$dsn, self::$username, self::$password, self::$options);
            return $pdo;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage() . "\nLine: " . $e->getLine() . "\nFile: " . $e->getFile());
        }
    }
}

