<?php

namespace Simple\Core;

use PDO;
use PDOException;

class Site
{

    public $logo;
    public $site_name;
    public $site_country;
    public $site_lang;

    public function __construct()
    {
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);

            $data = $dbh->query('SELECT name, value FROM site_settings');
            $records = $data->fetchAll();
            // foreach ($records as $record) {
            //     if ($record['name'] == 'logo') {
            //         $this->logo = $record['value'];
            //     }
            //     if ($record['name'] == 'site_name') {
            //         $this->site_name = $record['value'];
            //     }
            //     if ($record['name'] == 'site_country') {
            //         $this->site_country = $record['value'];
            //     }
            //     if ($record['name'] == 'site_lang') {
            //         $this->site_lang = $record['value'];
            //     }
            // }

            foreach ($records as $key => $value) {

                $this->$value[0] = $key[0];
                echo "<pre>";
                var_dump($value[0], $key);
                echo "</pre>";
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

    public function theLogo()
    {
        echo '<img src="' . $this->logo . '" alt="' . $this->site_name . '">';
    }

    public function getSiteGlobal()
    {
        $return = [];
        foreach ($this as $key => $value) {
            $return[$key] = $value;
        }
        return $return;
    }

    static function updateGlobal($settings)
    {
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);
        foreach ($settings as $setting => $value) {
            $sql = "UPDATE site_settings SET value=? WHERE name='" . $setting . "'";
            $stmt = $dbh->prepare($sql);
            $response = $stmt->execute([$value]);
        }
        $dbh = null;

        return true;
    }
}
