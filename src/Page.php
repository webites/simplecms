<?php

namespace Simple\Core;

session_start();

use PDO;

class Page
{
    public $id;
    public $title;
    public $slug;
    public $excerpt;
    public $content;

    public function __construct($id)
    {
        $this->id = $id;
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);

            $data = $dbh->query('SELECT * FROM pages_active WHERE id=' . $this->id);
            $record = $data->fetch();
            $this->title = $record['title'];
            $this->slug = $record['slug'];
            $this->excerpt = $record['excerpt'];
            $this->content = $record['content'];
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
}
