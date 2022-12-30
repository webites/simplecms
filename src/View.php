<?php


namespace Simple\Core;

session_start();

use Simple\Core\Page;
use Simple\Core\Site;
use voku\helper\Hooks;

class View
{
    protected $header;
    public $pageId;
    protected $template;
    protected $footer;

    public function __construct(int $pageId, $header = "main", $template = "main", $footer = "main")
    {
        $this->pageId = $pageId;
        $this->header = $header;
        $this->template = $template;
        $this->footer = $footer;
    }

    public function renderView()
    {
        $page = new Page($this->pageId);
        $site = new Site();
        $hooks = Hooks::getInstance();

        require_once('theme/header-' . $this->header . '.php');
        require_once('theme/page-' . $this->template . '.php');
        require_once('theme/footer-' . $this->footer . '.php');
    }
}
