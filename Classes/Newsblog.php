<?php
class Newsblog
{
    public $id;
    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        settype($this->id, 'integer');
    }
}