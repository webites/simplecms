<?php

namespace Simple\Core;

class Site
{

    public $logo;

    public function __construct()
    {
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);

            $data = $dbh->query('SELECT * FROM site_settings');
            $record = $data->fetch();
            $this->logo = $record['logo'];
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getLogoUrl()
    {
        return $this->logo;
    }
}
