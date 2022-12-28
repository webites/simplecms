<?php

namespace Simple\Core\Notification;

session_start();

class Alert
{
    protected $redirect;
    public $message;

    public function __construct(string $redirect, string $message)
    {
        $this->redirect = $redirect;
        $this->message = $message;
        $_SESSION['alert'] = $this->message;
        header('Location: ' . $this->redirect);
    }

    public function getTheAlert()
    {
        return "<div class='alert-get'>" . $this->message . "</div>";
    }
}
