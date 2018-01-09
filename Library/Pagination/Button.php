<?php

namespace Library\Pagination;

class Button
{
    public $page;
    public $text;
    public $isActive;
    public $prev;

    public function __construct($page, $isActive = true, $text = null, $prev = 3)
    {
        $this->page = $page;
        $this->text = is_null($text) ? $page : $text;
        $this->isActive = $isActive;
        $this->prev = $prev;
    }

    public function activate()
    {
        $this->isActive = true;
    }

    public function deactivate()
    {
        $this->isActive = false;
    }
}