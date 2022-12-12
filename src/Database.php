<?php


namespace Simple\Core;

use PDO;
use Delight\Auth\Auth;

class Database
{
    static function connect()
    {
        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);
        $auth = new Auth($db);
        return $auth;
    }
}
