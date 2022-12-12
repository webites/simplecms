<?php

namespace Simple\Core;

use PDO;

class DeletePage
{
    public $id;

    public function __construct($id)
    {

        $this->id = $id;
        try {

            $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=utf8", DB_USER, DB_PASSWORD);
            $date = date('M j Y g:i A', strtotime('2010-05-29 01:17:35'));
            $sql = "DELETE FROM pages_active WHERE id=?";
            $stmt = $dbh->prepare($sql);
            $response = $stmt->execute([$this->id]);
            $dbh = null;


            return true;
            $dbh = null;


            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
