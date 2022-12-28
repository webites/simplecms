<?php

namespace Simple\Core;

use PDO;

class EditPage
{
    public $id;
    public $title;
    public $slug;
    public $excerpt;
    protected $content;

    public function __construct($id, $title, $slug, $excerpt, $content)
    {

        $this->title = htmlspecialchars($title, ENT_QUOTES);
        $this->slug =  htmlspecialchars($slug, ENT_QUOTES);
        $this->excerpt =  htmlspecialchars($excerpt, ENT_QUOTES);
        $this->content = $content;
        $this->id = $id;
        $this->updated;
        try {
            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);

            $data = $dbh->query('SELECT slug FROM pages_active');
            $record = $data->fetchAll();
            $slug_exist = false;
            foreach ($record as $row) {

                if ($row['slug'] == $this->slug) {
                    if ($row['id'] == $this->id) {
                        $slug_exist = true;
                        $this->inserted = false;
                    } else {
                        $slug_exist = false;
                    }
                }
            }
            $dbh = null;

            if ($slug_exist === false) {
                $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);
                $date = date('M j Y g:i A', strtotime('2010-05-29 01:17:35'));
                $sql = "UPDATE `pages_active` SET title=?, slug=?, excerpt=?, content=? WHERE id=" . $this->id;
                $stmt = $dbh->prepare($sql);
                $response = $stmt->execute([$this->title, $this->slug, $this->excerpt, $this->content]);
                $dbh = null;


                return true;
                $dbh = null;
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
}
