<?php

class DB
{
    /**
     * @var PDO
     */
    private static $db = null;

    /**
     * @param $sql
     * @param array $props
     * @return mixed
     */
    public function query($sql, $props = [])
    {
        if (is_null(static::$db)) {
            static::init();
        }

        $prepared = static::$db->prepare($sql);

        $prepared->execute($props);

        return $prepared;
    }

    /**
     * @return string
     */
    public function lastInsertId()
    {
        return static::$db->lastInsertId();
    }

    private static function init()
    {
        $host = 'mysql';
        $user = 'root';
        $password = 'dev';
        $db = 'todo';

        static::$db = new PDO("mysql:host={$host};dbname={$db}", $user, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
}