<?php

namespace Simple\Core\Notification;

class Alert
{
    protected $redirect;
    protected $message;

    public function __construct(string $redirect, string $message)
    {
        $this->redirect = $redirect;
        $this->message = $message;

        header('Location: ' . $this->redirect);
        $_SESSION['alert'] = "<div class='alert-con'>" . $this->message . "</div>";
    }

    public function getTheAlert()
    {
        return "<div class='alert-get'>" . $this->message . "</div>";
    }
}
