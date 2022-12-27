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
        return "<div class='alert'>" . $this->message . "</div>";
    }

    public function getTheAlert()
    {
        echo "<div class='alert'>" . $this->message . "</div>";
    }
}
