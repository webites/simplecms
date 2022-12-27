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
        echo "<div class='alert'>" . $this->message . "";
    }
}
