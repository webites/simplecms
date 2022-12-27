<?php

namespace Simple\Core\Notification;

use voku\helper\Hooks;

class Alert
{
    protected $redirect;
    public $message;

    public function __construct(string $redirect, string $message)
    {
        $this->redirect = $redirect;
        $this->message = $message;

        header('Location: ' . $this->redirect);
    }

    public function getTheAlert()
    {
        return "<div class='alert-get'>" . $this->message . "</div>";
    }
}
