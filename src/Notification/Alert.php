<?php

namespace Simple\Core\Notification;

session_start();

class Alert
{
    protected $redirect;
    public $message;

    public function __construct(string $redirect, string $message, string $type = 'info')
    {
        $this->redirect = $redirect;
        $this->message = $message;
        $this->type = $type;
        $_SESSION['alert'] = $this->message;
        $_SESSION['type'] = $this->type;
        header('Location: ' . $this->redirect);
    }

    public function getTheAlert()
    {
        return "<div class='alert-get'>" . $this->message . "</div>";
    }
}
