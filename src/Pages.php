<?php

namespace Simple\Core;

use PDO;

class Pages
{
    public function getAll()
    {
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);

        $data = $dbh->query('SELECT * FROM pages_active');
        $record = $data->fetchAll();
        return $record;
    }

    public function getLimit(int $limit = 5)
    {
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);

        $data = $dbh->query('SELECT * FROM pages_active LIMIT ' . $limit);
        $record = $data->fetchAll();
        return $record;
    }

    public function getPageById(int $id)
    {
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);

        $data = $dbh->query('SELECT * FROM pages_active WHERE id=' . $id);
        $record = $data->fetch();
        return $record;
    }
}
