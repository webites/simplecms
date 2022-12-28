<?php

namespace Simple\Core;

use PDO;

class AddPage
{
    public $id;
    public $title;
    public $slug;
    public $excerpt;
    public $inserted;
    protected $content;

    public function __construct($title, $slug, $excerpt, $content)
    {

        $this->title = htmlspecialchars($title, ENT_QUOTES);
        $this->slug =  slug_creator(htmlspecialchars($slug, ENT_QUOTES));
        $this->excerpt =  htmlspecialchars($excerpt, ENT_QUOTES);
        $this->content = $content;
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);

            $data = $dbh->query('SELECT slug FROM pages_active');
            $record = $data->fetchAll();
            $slug_exist = false;
            foreach ($record as $row) {

                if ($row['slug'] == $this->slug) {
                    $slug_exist = true;
                    return false;
                }
            }
            $dbh = null;

            if ($slug_exist === false) {
                $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);
                $date = date('M j Y g:i A', strtotime('2010-05-29 01:17:35'));
                $sql = "INSERT INTO `pages_active` (`id`, `title`, `slug`, `excerpt`, `content`, `create_at`) 
                VALUES (NULL, ?,?,?,?,?);";
                $stmt = $dbh->prepare($sql);
                $response = $stmt->execute([$this->title, $this->slug, $this->excerpt, $this->content, $date]);
                $dbh = null;

                $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);
                $data = $dbh->query("SELECT id FROM pages_active WHERE slug='" . $this->slug . "'");
                $record = $data->fetch();
                $this->id = $record['id'];
                $this->inserted = true;

                return true;
                $dbh = null;
            } else {
                $this->inserted = false;
                return false;
            }

            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getIdBySlug(string $slug)
    {
        $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);
        $data = $dbh->query("SELECT id FROM pages_active WHERE slug=" . $slug);
        $record = $data->fetch();
        $dbh = null;
        return $record[0];
    }
}
