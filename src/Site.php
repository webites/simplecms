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
        foreach ($settings as $setting => $key) {
            var_dump($key, $setting);
        }

        // $sql = "UPDATE `site_settings` SET title=?, slug=?, excerpt=?, content=? WHERE id=" . $this->id;
        // $stmt = $dbh->prepare($sql);
        // $response = $stmt->execute([$this->title, $this->slug, $this->excerpt, $this->content]);
        // $dbh = null;

        // $this->updated = true;
        // return true;
    }
}
