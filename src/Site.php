<?php

namespace Simple\Core;

use PDO;
use PDOException;

class Site
{

    public $logo;
    public $site_name;

    public function __construct()
    {
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);

            $data = $dbh->query('SELECT name, value FROM site_settings');
            $records = $data->fetchAll();
            foreach ($records as $record) {
                if ($record['name'] == 'logo') {
                    $this->logo = $record['value'];
                }
                if ($record['name'] == 'site_name') {
                    $this->site_name = $record['value'];
                }
            }

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

    public function theLogo(){
        echo '<img src="'.$this->logo.'" alt="'.$this->site_name.'">'
    }
}
