<?php

namespace Simple\Core\Notification;

session_start();
class Alert
{
    protected $redirect;
    public $message;

    public function __construct(string $redirect, string $message)
    {
        session_start();
        $this->redirect = $redirect;
        $this->message = $message;
        include_once('php-hooks.php');
        global $hooks;
        $hooks->add_action('notifications', function () {
            echo "<div class='alert-get'>" . $this->message . "</div>";
        });
        header('Location: ' . $this->redirect);
    }

    public function getTheAlert()
    {
        return "<div class='alert-get'>" . $this->message . "</div>";
    }
}
